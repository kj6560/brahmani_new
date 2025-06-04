<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DynamicPageController extends Controller
{
    public function loadPage(Request $request)
    {
        return view('frontend.dynamic_page', ['settings' => $request->settings]);

    }
    public function loadProductCategory(Request $request, $slug)
    {
        $filters = $request->all();
        $product_category = ProductCategory::where('pro_cat_slug',$slug)->first();
        if(empty($product_category)){
            return redirect()->back()->with('error', 'Product category not found');
        }
        $category_products = Product::
            where('product_status', 1)
            ->groupBy('id');
        if(!empty($slug)){
            $category_products = $category_products->where('product_category', $product_category->id);
        }
        if((isset($filters['Min_Price']) && $filters['Min_Price'] != '') && ($filters['Min_Price'] != 0 && $filters['Max_Price'] != 0)){
            $category_products = $category_products->where('product_price', '>=', $filters['Min_Price']);
        }
        if(isset($filters['Length']) && $filters['Length'] != ''){
            $category_products = $category_products->where('length', $filters['Length']);
        }
        if(isset($filters['Width']) && $filters['Width'] != ''){
            $category_products = $category_products->where('width', $filters['Width']);
        }
        if(isset($filters['Thickness']) && $filters['Thickness'] != ''){
            $category_products = $category_products->where('thickness', $filters['Thickness']);
        }
        if(isset($filters['Color']) && $filters['Color'] != ''){
            $category_products = $category_products->where('color', $filters['Color']);
        }
        if(isset($filters['Usage_Of_Panels']) && $filters['Usage_Of_Panels'] != ''){
            $category_products = $category_products->where('usage_of_panel', $filters['Usage_Of_Panels']);
        }
        if(isset($filters['Instock']) && $filters['Instock'] != ''){
            $category_products = $category_products->where('instock', $filters['Instock']);
        }
        if(isset($filters['Panel_Included']) && $filters['Panel_Included'] != ''){
            $category_products = $category_products->where('panel_included', $filters['Panel_Included']);
        }
        $category_products = $category_products->get();
        foreach ($category_products as $category_product) {
            if(empty($category_product->product_slug) && !empty($category_product->product_name)){
                $slug =  $this->slugify($category_product->product_name);
                $category_product->product_slug = $slug;
                $category_product->save();
            }
        }
        return view('frontend.dynamic_cat_page', ['settings' => $request->settings, 'category' => $product_category, 'category_products' => $category_products,'filters' => $filters]);
    }
    public function loadProductCategoryAll(Request $request)
    {
        $filters = $request->all();
        $category_products = Product::
            where('product_status', 1)
            ->groupBy('id');
        
        if((isset($filters['Min_Price']) && $filters['Min_Price'] != '') && ($filters['Min_Price'] != 0 && $filters['Max_Price'] != 0)){
            $category_products = $category_products->where('product_price', '>=', $filters['Min_Price']);
        }
        if(isset($filters['Length']) && $filters['Length'] != ''){
            $category_products = $category_products->where('length', $filters['Length']);
        }
        if(isset($filters['Width']) && $filters['Width'] != ''){
            $category_products = $category_products->where('width', $filters['Width']);
        }
        if(isset($filters['Thickness']) && $filters['Thickness'] != ''){
            $category_products = $category_products->where('thickness', $filters['Thickness']);
        }
        if(isset($filters['Color']) && $filters['Color'] != ''){
            $category_products = $category_products->where('color', $filters['Color']);
        }
        if(isset($filters['Usage_Of_Panels']) && $filters['Usage_Of_Panels'] != ''){
            $category_products = $category_products->where('usage_of_panel', $filters['Usage_Of_Panels']);
        }
        if(isset($filters['Instock']) && $filters['Instock'] != ''){
            $category_products = $category_products->where('instock', $filters['Instock']);
        }
        if(isset($filters['Panel_Included']) && $filters['Panel_Included'] != ''){
            $category_products = $category_products->where('panel_included', $filters['Panel_Included']);
        }
        $category_products = $category_products->paginate(12);
        return view('frontend.dynamic_cat_page', ['settings' => $request->settings, 'category_products' => $category_products,'filters' => $filters]);
    }
    public function loadProducts(Request $request, $slug)
    {
        $product = Product::leftJoin('product_images as pi', 'pi.product_id', '=', 'products.id')
            ->where('products.product_slug', $slug)
            ->where('pi.image_status', 1)
            ->where('products.product_status', 1)
            ->select(
                'products.*',
                DB::raw('GROUP_CONCAT(pi.image SEPARATOR ",") as all_images'),
                DB::raw('GROUP_CONCAT(CONCAT(pi.image_alias) SEPARATOR ",") as image_aliases')
            )
            ->groupBy('products.id')
            ->first();
        if(!$product){
            return redirect()->back()->with('error', 'Product not found');
        }
        return view('frontend.dynamic_product_page', ['settings' => $request->settings, 'product' => $product]);
    }
}
