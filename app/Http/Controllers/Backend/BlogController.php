<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\PostTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = DB::table('blog_posts')
                ->distinct()
                ->join('categories', 'blog_posts.category_id', '=', 'categories.id')
                ->select('blog_posts.id as id', 'blog_posts.title as title', 'categories.name as category', 'blog_posts.active as active');

            return DataTables::of($orders)
                ->orderColumn('blog_posts.id', function ($query, $order) {
                    $query->orderBy('blog_posts.id', $order);
                })
                ->orderColumn('blog_posts.title', function ($query, $order) {
                    $query->orderBy('blog_posts.title', $order);
                })
                ->orderColumn('categories.name', function ($query, $order) {
                    $query->orderBy('categories.name', $order);
                })
                ->orderColumn('blog_posts.active', function ($query, $order) {
                    $query->orderBy('blog_posts.active', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/blogSettings/blogs/edit/{$row->id}";
                    $deleteUrl = "/admin/blogSettings/blogs/delete/{$row->id}";
                    $disableUrl = "/admin/blogSettings/blogs/disable/{$row->id}";

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
        return view('backend.blog.index', ['settings' => $request->settings]);
    }
    public function createBlog(Request $request)
    {
        $blogCategories = DB::table('categories')->where('active', 1)->get();
        $tags = DB::table('tags')->where('active', 1)->get();
        return view('backend.blog.createBlog', ['settings' => $request->settings, 'categories' => $blogCategories, 'tags' => $tags]);
    } 
    public function editBlog(Request $request, $id)
    {
        $blogPost = BlogPost::find($id);
        $blogCategories = DB::table('categories')->where('active', 1)->get();
        $tags = DB::table('tags')->where('active', 1)->get();
        $selectedTags = DB::table('post_tags')->where('post_id', $id)->pluck('tag_id')->toArray();

        return view('backend.blog.createBlog', [
            'settings' => $request->settings,
            'post' => $blogPost,
            'categories' => $blogCategories,
            'tags' => $tags,
            'selectedTags' => $selectedTags
        ]);
    }
    public function deleteBlog(Request $request, $id)
    {
        $blogPost = BlogPost::find($id);
        $blogPost->delete();
        return redirect('/admin/blogSettings')->with('success', 'Blog post deleted successfully');
    }
    public function storeBlogPost(Request $request)
    {
        if (!empty($request->id)) {
            $blogPost = BlogPost::find($request->id);
        } else {
            $blogPost = new BlogPost();
        }

        $featured_image = $request->file('featured_image');
        if (!empty($featured_image)) {
            $imageName = time() . '.' . $featured_image->getClientOriginalExtension();
            $productBanner = $featured_image->storeAs('uploads', $imageName, 'public');
            $blogPost->featured_image = $productBanner;
        }
        $blogPost->title = $request->title;
        $blogPost->slug = $this->convertToSlug($request->title);
        $blogPost->small_desc = $request->small_desc;
        $blogPost->content = nl2br($request->content);
        $blogPost->user_id = auth()->user()->id;
        $blogPost->published_at = Date::now();
        $blogPost->show_on_homepage = $request->show_on_homepage;
        $blogPost->show_large_on_homepage = $request->show_large_on_homepage;
        $blogPost->category_id = $request->category_id;
        $blogPost->active = $request->active;
        $blogPost->save();
        if (!empty($request->tags)) {
            $postTags = PostTags::where('post_id', $blogPost->id)->delete();

            foreach ($request->tags as $key => $tag) {
                $postTags = new PostTags();
                $postTags->post_id = $blogPost->id;
                $postTags->tag_id = $tag;
                $postTags->save();
            }
        }
        return redirect('/admin/blogSettings')->with('success', 'Blog post created successfully');
    }
    public function convertToSlug($title)
    {
        // Convert the title to a slug
        $slug = Str::slug($title, '-');

        // Check if the slug already exists
        $count = BlogPost::where('slug', 'LIKE', "{$slug}%")->count();

        // If the slug exists, append a number to make it unique
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function listCategories(Request $request)
    {
        if ($request->ajax()) {
            $orders = DB::table('categories')
                ->distinct();

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('name', function ($query, $order) {
                    $query->orderBy('name', $order);
                })
                ->orderColumn('slug', function ($query, $order) {
                    $query->orderBy('slug', $order);
                })
                ->orderColumn('active', function ($query, $order) {
                    $query->orderBy('active', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/blogSettings/categories/edit/{$row->id}";
                    $deleteUrl = "/admin/blogSettings/categories/delete/{$row->id}";
                    $disableUrl = "/admin/blogSettings/categories/disable/{$row->id}";

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
        return view('backend.blog.listCategories', ['settings' => $request->settings]);
    }
    public function createCategory(Request $request)
    {
        return view('backend.blog.createCategory', ['settings' => $request->settings]);
    }
    public function editCategory(Request $request, $id)
    {
        $category = BlogCategory::find($id);
        return view('backend.blog.createCategory', ['settings' => $request->settings, 'category' => $category]);
    }
    public function storeCategory(Request $request)
    {
        if (!empty($request->id)) {
            $category = BlogCategory::find($request->id);
        } else {
            $category = new BlogCategory();
        }
        $category->name = $request->name;
        $category->slug = $this->convertToSlug($request->name);
        $category->description = $request->description;
        $category->active = $request->active;
        $category->save();

        return redirect('/admin/blogSettings/categories')->with('success', 'Category created successfully');
    }
    public function deleteCategory(Request $request, $id)
    {
        $category = BlogCategory::find($id);
        $category->delete();
        return redirect('/admin/blogSettings/categories')->with('success', 'Category deleted successfully');
    }
    public function listTags(Request $request)
    {
        if ($request->ajax()) {
            $orders = DB::table('tags')
                ->distinct();

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('name', function ($query, $order) {
                    $query->orderBy('name', $order);
                })
                ->orderColumn('slug', function ($query, $order) {
                    $query->orderBy('slug', $order);
                })
                ->orderColumn('active', function ($query, $order) {
                    $query->orderBy('active', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/blogSettings/tags/edit/{$row->id}";
                    $deleteUrl = "/admin/blogSettings/tags/delete/{$row->id}";
                    $disableUrl = "/admin/blogSettings/tags/disable/{$row->id}";

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
        return view('backend.blog.listTags', ['settings' => $request->settings]);
    }
    public function createTag(Request $request)
    {
        return view('backend.blog.createTag', ['settings' => $request->settings]);
    }
    public function editTag(Request $request, $id)
    {
        $tag = BlogTag::find($id);
        return view('backend.blog.createTag', ['settings' => $request->settings, 'tag' => $tag]);
    }
    public function storeTag(Request $request)
    {
        if (!empty($request->id)) {
            $tag = BlogTag::find($request->id);
        } else {
            $tag = new BlogTag();
        }
        $tag->name = $request->name;
        $tag->slug = $this->convertToSlug($request->name);
        $tag->active = $request->active;
        $tag->save();

        return redirect('/admin/blogSettings/tags')->with('success', 'Tag created successfully');
    }
    public function deleteTag(Request $request, $id)
    {
        $tag = BlogTag::find($id);
        $tag->delete();
        return redirect('/admin/blogSettings/tags')->with('success', 'Tag deleted successfully');
    }
}
