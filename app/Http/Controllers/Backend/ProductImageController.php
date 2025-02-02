<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductImageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = DB::table('product_images as pi')
                ->join('products as p', 'pi.product_id', '=', 'p.id')
                ->distinct()
                ->select('pi.id as id', 'p.product_name as product_name', 'pi.image_status as image_status','pi.image as image');

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('product_name', function ($query, $order) {
                    $query->orderBy('product_name', $order);
                })
                ->orderColumn('image', function ($query, $order) {
                    $query->orderBy('image', $order);
                })
                ->orderColumn('image_status', function ($query, $order) {
                    $query->orderBy('image_status', $order);
                })
                ->addColumn('action', function ($row) {
                    $disableUrl = "/admin/products/images/disable/{$row->id}";

                    $disableButton = '';
                    $disableButton = "<a href='$disableUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Change Status</a>";

                    return "
                    <div class='dropdown'>
                        <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </button>
                        <div class='dropdown-menu'>
                            $disableButton
                        </div>
                    </div>
                ";
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('backend.product_image.index',['settings' => $request->settings]);
    }
    public function create(Request $request)
    {
        $products = Product::all();
        return view('backend.product_image.create', ['products' => $products,'settings' => $request->settings]);
    }
    public function edit(Request $request, $id)
    {
        $product_image = DB::table('product_images as pi')
            ->where('pi.id', $id)
            ->first();
        $products = Product::all();
        return view('backend.product_image.create', ['settings' => $request->settings,'products' => $products, 'product_image' => $product_image]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['settings']);
        $images = $request->file('images');
        
        if ($images && is_array($images)) {
            foreach ($images as $image) {
                $productImage = new ProductImages();
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $slide = $image->storeAs('uploads', $imageName, 'public');
                $productImage->image = $slide;
                $productImage->product_id = $data['product_id'];
                $productImage->image_alias = $data['image_alias'];
                $productImage->image_status = $data['image_status'];
                $productImage->save();
            }
        } else {
            return redirect()->back()->with('error', "No images found");
        }
        
        return redirect()->back()->with('success', "Product images uploaded");
    }
    public function disable(Request $request, $id)
    {
        $product_image = ProductImages::find($id);
        if($product_image->image_status == 0){
            $product_image->image_status = 1;
        }else {
            $product_image->image_status = 0;
        }
        $product_image->save();
        return redirect()->back()->with('success', "Product image disabled");
    }
}
