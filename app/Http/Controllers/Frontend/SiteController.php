<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\City;
use App\Models\ContactQuery;
use App\Models\Country;
use App\Models\Pages;
use App\Models\PostTags;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $product_categories = ProductCategory::where('pro_cat_active', 1)
            ->where('show_on_home_page', 1)
            ->orderBy('product_category_order', 'asc')
            ->limit(5)->get();
        return view('frontend.index', ['settings' => $request->settings, 'latest_categories' => $product_categories]);
    }
    public function companyProfile(Request $request)
    {
        return view('frontend.companyProfile', ['settings' => $request->settings]);
    }
    public function sitemap(Request $request)
    {
        return view('frontend.sitemap', ['settings' => $request->settings]);
    }
    public function testimonial(Request $request)
    {
        return view('frontend.testimonial', ['settings' => $request->settings]);
    }
    public function contactUs(Request $request)
    {
        return view('frontend.contactUs', ['settings' => $request->settings]);
    }
    public function aboutUs(Request $request)
    {
        return view('frontend.aboutUs', ['settings' => $request->settings]);
    }
    public function blog(Request $request)
    {
        $blogs = BlogPost::join('users', 'users.id', '=', 'blog_posts.user_id')

            ->where('blog_posts.active', 1)
            ->select('blog_posts.*', 'users.name as user_name')
            ->orderBy('blog_posts.id', 'desc')
            ->paginate(10);

        return view('frontend.blog', ['settings' => $request->settings, 'blogs' => $blogs]);
    }
    public function blogDetails(Request $request, $id)
    {
        $blog = BlogPost::join('users', 'users.id', '=', 'blog_posts.user_id')
            ->leftJoin('post_tags', 'post_tags.post_id', '=', 'blog_posts.id')
            ->leftJoin('tags', 'tags.id', '=', 'post_tags.tag_id')
            ->where('blog_posts.active', 1)
            ->where('blog_posts.id', $id)
            ->select(
                'blog_posts.*',
                'users.name as user_name',
                DB::raw("GROUP_CONCAT(DISTINCT tags.name SEPARATOR ', ') as tag_names")
            )
            ->groupBy('blog_posts.id') // Group by the blog post ID
            ->first();
            $recentBlogs = BlogPost::where('blog_posts.active', 1)
            ->whereNotIn('blog_posts.id', [$id])
            ->orderBy('blog_posts.id', 'desc')
            ->limit(5)
            ->get();
        $allTags = DB::table('tags')->get();
        $prevPost = BlogPost::select('id', 'title')->where('id', '=', $id - 1)->first();
        $nextPost = BlogPost::select('id', 'title')->where('id', '=', $id + 1)->first();
        $blogCategories = BlogCategory::all();
        
        return view('frontend.blogDetails', ['settings' => $request->settings,'recent'=>$recentBlogs, 'blog' => $blog,'allTags'=>$allTags, 'prevPost' => $prevPost, 'nextPost' => $nextPost,'blogCategories'=>$blogCategories]);
    }
    public function blogByTags(Request $request,$id){
        $blogs = BlogPost::join('users', 'users.id', '=', 'blog_posts.user_id')
            ->leftJoin('post_tags', 'post_tags.post_id', '=', 'blog_posts.id')
            ->leftJoin('tags', 'tags.id', '=', 'post_tags.tag_id')
            ->where('blog_posts.active', 1)
            ->where('tags.id', $id)
            ->select(
                'blog_posts.*',
                'users.name as user_name'
            )
            ->orderBy('blog_posts.id', 'desc')
            ->paginate(10);
        return view('frontend.blog', ['settings' => $request->settings, 'blogs' => $blogs]);
    }
    public function blogByCategory(Request $request,$id){
        $blogs = BlogPost::join('users', 'users.id', '=', 'blog_posts.user_id')
            ->where('blog_posts.active', 1)
            ->where('blog_posts.category_id', $id)
            ->select(
                'blog_posts.*',
                'users.name as user_name'
            )
            ->orderBy('blog_posts.id', 'desc')
            ->paginate(10);
        return view('frontend.blog', ['settings' => $request->settings, 'blogs' => $blogs]);
    }
    public function storeQuery(Request $request)
    {
        $defaultMessage = "To Get Best Quotes describe your requirements in detail like";
        $data = $request->all();
        if (!empty($request->input('address'))) {
            return back()->with('error', 'Spam detected. Submission rejected.');
        }
        $validate  = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'phone' => 'required|regex:/^[6-9]\d{9}$/',
            'message' => 'string|max:2000',
        ]);
        if (str_contains($data['message'], $defaultMessage)) {
            return redirect()->back()->with('error', 'Please describe your requirements in detail');
        }
        if (!$this->validateMobileNumber($data['phone'])) {
            return redirect()->back()->with('error', 'Please enter valid mobile number');
        }
        if (empty($data['name'])) {
            return redirect()->back()->with('error', 'Please enter your name');
        }
        $query = new ContactQuery();
        $query->name = $data['name'];
        $query->number = $data['phone'];
        $query->message = $data['message'];
        $query->email = $data['email'];
        $query->location = $data['location'];
        $query->is_active = 1;
        if ($query->save()) {
            return redirect()->back()->with('success', 'Your query has been submitted successfully. We will get back to you soon');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later');
        }
    }
    public function validateMobileNumber($number)
    {
        // Regular expression for Indian mobile numbers
        $pattern = '/^[6-9]\d{9}$/';

        if (preg_match($pattern, $number)) {
            return true;
        } else {
            return false;
        }
    }
    public function pageError(Request $request)
    {
        return view('frontend.pageError');
    }
    public function wishlist(Request $request, $id)
    {
        $product_ids = Session::get('wishlist', []);
        if (!in_array($id, $product_ids)) {
            $product_ids[] = $id;
        }
        Session::put('wishlist', $product_ids);
        return response()->json(['success' => true, 'message' => 'Product added to wishlist']);
    }
    public function showWishlist(Request $request)
    {
        $product_ids = Session::get('wishlist', []);
        $products = [];
        foreach ($product_ids as $product_id) {
            $product = Product::find($product_id);
            if ($product) {
                $products[] = $product;
            }
        }
        return view('frontend.wishlist', ['products' => $products, 'settings' => $request->settings]);
    }
    public function removeFromWishlist(Request $request)
    {
        $id = $request->id;
        $product_ids = Session::get('wishlist', []);
        $product_ids = array_diff($product_ids, [$id]);
        Session::put('wishlist', $product_ids);
        return response()->json(['success' => true, 'message' => 'Product removed from wishlist']);
    }
    public function raiseQuery(Request $request)
    {
        $name = $request->name;
        $phone = $request->number;
        $product_ids = Session::get('wishlist', []);
        $queryContact = new ContactQuery();
        $queryContact->name = $name;
        $queryContact->number = $phone;
        $queryContact->message = "I want to raise query for following products: " . implode(", ", $product_ids);
        $queryContact->is_active = 1;
        if ($product_ids != null && !empty($product_ids)) {
            $queryContact->product_ids = json_encode($product_ids);
        }

        if ($queryContact->save()) {
            Session::forget('wishlist');
            return response()->json(['success' => true, 'message' => 'Query raised successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong. Please try again later']);
        }
    }
    public function clearWishlist(Request $request)
    {
        Session::forget('wishlist');
        return response()->json(['success' => true, 'message' => 'Wishlist cleared successfully']);
    }
    public function faq(Request $request)
    {
        return view('frontend.faq', ['settings' => $request->settings]);
    }
    public function privacy_policy(Request $request)
    {
        return view('frontend.privacyPolicy', ['settings' => $request->settings]);
    }
}
