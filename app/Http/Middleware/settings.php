<?php

namespace App\Http\Middleware;

use App\Models\Pages;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Sliders;
use App\Models\WebsiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class settings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allSettings = [];
        //header search
        if (isset($request->s)) {
            $query = $request->s;
            $filters = $request->all();
            
            $product = Product::join('product_category as pc', 'pc.id', '=', 'products.product_category')
                ->select(
                    'products.id as id',
                    'products.product_name as product_name',
                    'products.product_banner as product_banner',
                    'products.product_description as product_description',
                    'products.product_price as product_price',
                    'pc.pro_cat_name as category_name'
                );
                if((isset($filters['min_price']) && $filters['min_price'] != '') && ($filters['min_price'] != 1 && $filters['max_price'] != 1)){
                    $product = $product->where('product_price', '>=', $filters['min_price']);
                }
                if(isset($filters['length']) && $filters['length'] != ''){
                    $product = $product->where('length', $filters['length']);
                }
                if(isset($filters['width']) && $filters['width'] != ''){
                    $product = $product->where('width', $filters['width']);
                }
                if(isset($filters['thickness']) && $filters['thickness'] != ''){
                    $product = $product->where('thickness', $filters['thickness']);
                }
                if(isset($filters['color']) && $filters['color'] != ''){
                    $product = $product->where('color', $filters['color']);
                }
                if(isset($filters['usage_of_panels']) && $filters['usage_of_panels'] != ''){
                    $product = $product->where('usage_of_panel', $filters['usage_of_panels']);
                }
                if(isset($filters['instock']) && $filters['instock'] != ''){
                    $product = $product->where('instock', $filters['instock']);
                }
                if(isset($filters['panel_included']) && $filters['panel_included'] != ''){
                    $product = $product->where('panel_included', $filters['panel_included']);
                }
            if ($query != null && strlen($query) > 2) {

                $product = $product->where('products.product_name', 'like', '%' . $query . '%');

            }

            $product = $product->get();
            $allSettings['search'] = $product;
        }
        //fetch general website settings
        $settings = WebsiteSetting::where('is_active', 1)->first();
        if (!empty($settings) && $settings != null) {
            $attr = $settings->getAttributes();
            foreach ($attr as $key => $value) {
                $allSettings[$key] = $value;
            }
        }
        //fetch product categories for menu
        $productCategories = ProductCategory::where('pro_cat_active', 1)->orderBy('product_category_order', 'asc')->get();
        $allSettings['product_categories'] = $productCategories;
        //page settings
        $current_url = parse_url(url()->current());
        if (empty($current_url['path'])) {
            $page = Pages::where('page_url', null)->first();
        } else {
            $p_ar = explode("/", $current_url['path']);
            $page = Pages::where('page_url',$p_ar[1])->first();
        }
        if (!empty($page->id)) {
            $allSettings['page_data'] = $page;

        }
        if(str_contains($current_url['path'],'/products')) {
            $parts = explode("/",$current_url['path']);
            if(!empty($parts[2])) {
                $product = Product::select('product_meta_title','product_meta_discription','product_meta_keywords')->where('product_slug', $parts[2])->first();
                if(!empty($product->id)) {
                    $allSettings['page_data']=[
                        'seo_title' => $product->product_meta_title,
                        'seo_desc'=> $product->product_meta_discription,
                        'seo_keywords'=> $product->product_meta_keywords,
                    ];
                }
            }
        }
        $request->merge(['settings' => $allSettings]);
        return $next($request);

    }
}
