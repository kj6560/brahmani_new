<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EnquiriesController extends Controller
{
    public function index(Request $request)
    {if ($request->ajax()) {
        $orders = DB::table('contactQuery')
            ->distinct()
            ->where('is_active', 1)
            ->select('id', 'name', 'number', 'message');

        return DataTables::of($orders)
            ->orderColumn('id', function ($query, $order) {
                $query->orderBy('id', $order);
            })
            ->orderColumn('name', function ($query, $order) {
                $query->orderBy('name', $order);
            })
            ->orderColumn('number', function ($query, $order) {
                $query->orderBy('number', $order);
            })
            ->orderColumn('message', function ($query, $order) {
                $query->orderBy('message', $order);
            })
            ->addColumn('action', function ($row) {
                $deleteUrl = "/admin/enquiries/delete/{$row->id}";
                $viewUrl = "/admin/enquiries/view/{$row->id}";
                $deleteButton = '';
                $viewButton = '';
                $deleteButton = "<a href='$deleteUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Delete</a>";
                $viewButton = "<a href='$viewUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> View</a>";
                return "
                <div class='dropdown'>
                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </button>
                    <div class='dropdown-menu'>
                    $viewButton
                        $deleteButton
                    </div>
                </div>
            ";
            })
            ->rawColumns(['action'])
            ->make(true);
    }
        return view('backend.enquiries.index',['settings' => $request->settings]);
    }
    public function delete($id)
    {
        DB::table('contactQuery')->where('id', $id)->update(['is_active'=>0]);
        return redirect()->back()->with('success', 'Enquiry deleted successfully');
    }
    public function view(Request $request,$id)
    {
        $enquiry = DB::table('contactQuery')->where('id', $id)->first();

        if(!empty($enquiry->id) && !empty($enquiry->product_ids)){
            $product_ids = get_object_vars(json_decode($enquiry->product_ids));
            $products = DB::table('products')->whereIn('id', array_keys($product_ids))->get();
            $enquiry->products = $products;
        }
        return view('backend.enquiries.view', ['enquiry' => $enquiry,'settings' => $request->settings]);
    }
}
