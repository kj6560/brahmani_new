<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = DB::table('product_category')
                ->distinct()
                ->select('id', 'pro_cat_name','product_category_order', 'pro_cat_active');

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('pro_cat_name', function ($query, $order) {
                    $query->orderBy('pro_cat_name', $order);
                })
                ->orderColumn('product_category_order', function ($query, $order) {
                    $query->orderBy('product_category_order', $order);
                })
                ->orderColumn('pro_cat_active', function ($query, $order) {
                    $query->orderBy('pro_cat_active', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/products/categories/edit/{$row->id}";
                    $deleteUrl = "/admin/products/categories/delete/{$row->id}";
                    $disableUrl = "/admin/products/categories/disable/{$row->id}";

                    $editButton = '';
                    $deleteButton = '';
                    $disableButton = '';

                    $editButton = "<a href='$editUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Edit</a>";
                    $disableButton = "<a href='$disableUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Disable</a>";
                    $deleteButton = "<a href='$deleteUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Delete</a>";

                    return "
                    <div class='dropdown'>
                        <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </button>
                        <div class='dropdown-menu'>
                            $editButton
                            $disableButton
                            $deleteButton
                        </div>
                    </div>
                ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.product_category.index',['settings' => $request->settings]);
    }
    public function create(Request $request)
    {
        $categories = ProductCategory::pluck('product_category_order')->toArray();
        if(!empty($categories)){
            $nextProductCategoryOrders = max($categories) + 1;
        }else{
            $nextProductCategoryOrders =1;
        }
        return view('backend.product_category.create', ['settings' => $request->settings,'nextOrder' => $nextProductCategoryOrders]);
    }
    public function edit(Request $request, $id)
    {
        $product = DB::table('product_category')->where('id', $id)->first();
        $nextProductCategoryOrders = max(ProductCategory::pluck('product_category_order')->toArray()) + 1;
        return view('backend.product_category.create', ['settings' => $request->settings,'product' => $product, 'nextOrder' => $nextProductCategoryOrders]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['settings']);
        // Check if the request is for updating an existing product category
        if (!empty($data['id'])) {
            $product = ProductCategory::find($data['id']);
            if (!$product) {
                return redirect()->back()->with('error', 'Product category not found.');
            }
        } else {
            $product = new ProductCategory();
        }

        // Handle the image upload
        $pro_cat_image = $request->file('pro_cat_image');
        if (!empty($pro_cat_image)) {
            $imageName = time() . '.' . $pro_cat_image->getClientOriginalExtension();
            $slide = $pro_cat_image->storeAs('uploads', $imageName, 'public');
            $product->pro_cat_image = $slide;
        }

        // Assign other fields
        $product->pro_cat_name = $data['pro_cat_name'];
        $product->pro_cat_active = $data['pro_cat_status'];
        $product->pro_cat_description = $data['pro_cat_description'];
        $product->show_on_home_page = $data['show_on_home_page'];
        // Handle product category order
        $newOrder = $data['product_category_order'] ?? null;

        if ($newOrder) {
            if (!empty($data['id'])) {
                // For updates, shift the orders of other categories
                ProductCategory::where('id', '!=', $data['id'])
                    ->where('product_category_order', '>=', $newOrder)
                    ->increment('product_category_order');
            } else {
                // For new entries, shift the orders of existing categories
                ProductCategory::where('product_category_order', '>=', $newOrder)
                    ->increment('product_category_order');
            }
            $product->product_category_order = $newOrder;
        } else {
            // If no specific order is provided, assign the next available order
            $product->product_category_order = ProductCategory::max('product_category_order') + 1;
        }

        // Save the product category
        if ($product->save()) {
            // Re-sequence the order after saving
            $this->resequenceProductCategories();
            return redirect()->back()->with('success', 'Product category saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }


    private function resequenceProductCategories()
    {
        $categories = ProductCategory::orderBy('product_category_order')->get();
        foreach ($categories as $index => $category) {
            $category->update(['product_category_order' => $index + 1]);
        }
    }

    public function delete(Request $request, $id)
    {
        $product = ProductCategory::find($id);
        if ($product->delete()) {
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function disable(Request $request, $id)
    {
        $product = ProductCategory::find($id);
        $product->product_status = 0;
        if ($product->save()) {
            return redirect()->back()->with('success', 'Product disabled successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
