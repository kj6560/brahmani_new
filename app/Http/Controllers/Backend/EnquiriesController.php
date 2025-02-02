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

                $deleteButton = '';

                $deleteButton = "<a href='$deleteUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Delete</a>";

                return "
                <div class='dropdown'>
                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </button>
                    <div class='dropdown-menu'>
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
}
