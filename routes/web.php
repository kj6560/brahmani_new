<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BulkPageController;
use App\Http\Controllers\Backend\EmailTemplateController;
use App\Http\Controllers\Backend\EnquiriesController;
use App\Http\Controllers\Backend\ForwardController;
use App\Http\Controllers\Backend\FrontendMenuController;
use App\Http\Controllers\Backend\PageContentController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\DynamicPageController;
use App\Http\Controllers\Frontend\ExportersCategory;
use App\Http\Controllers\Frontend\ManufacturersCategory;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Frontend\SuppliersCategory;
use App\Http\Middleware\settings;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;

RateLimiter::for('storeQuery', function ($request) {
    return Limit::perMinute(5)->by($request->ip());
});


//frontend routes
Route::get('/', [SiteController::class, 'index'])->middleware([settings::class])->name('frontend.index');
Route::get('/companyProfile', [SiteController::class, 'companyProfile'])->middleware([settings::class])->name('frontend.companyProfile');
Route::get('/pageError', [SiteController::class, 'pageError'])->name('frontend.pageError');
Route::get('/sitemap', [SiteController::class, 'sitemap'])->middleware([settings::class])->name('frontend.sitemap');
Route::get('/contact_us', [SiteController::class,'contactUs'])->middleware([settings::class])->name('frontend.contactUs');
Route::get('/about_us', [SiteController::class,'aboutUs'])->middleware([settings::class])->name('frontend.aboutUs');
Route::get('/blog', [SiteController::class,'blog'])->middleware([settings::class])->name('frontend.blog');
Route::get('/blog_detail/{id}', [SiteController::class,'blogDetails'])->middleware([settings::class])->name('frontend.blogDetails');
Route::get('/blogByTags/{id}', [SiteController::class,'blogByTags'])->middleware([settings::class])->name('frontend.blogByTags');
Route::get('/blogByCategory/{id}', [SiteController::class,'blogByCategory'])->middleware([settings::class])->name('frontend.blogByCategory');
Route::post('/storeQuery', [SiteController::class,'storeQuery'])->middleware([settings::class])->name('frontend.storeQuery');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('backend.logout');
Route::post('/wishlist',[SiteController::class,'wishlist'])->middleware([settings::class])->name('frontend.wishlist');
Route::get('/removeFromWishlist',[SiteController::class,'removeFromWishlist'])->middleware([settings::class])->name('frontend.removeFromWishlist');
Route::get('/showWishlist',[SiteController::class,'showWishlist'])->middleware([settings::class])->name('frontend.showWishlist');
Route::get('/raiseQuery',[SiteController::class,'raiseQuery'])->middleware([settings::class])->name('frontend.raiseQuery');
Route::get('/faq', [SiteController::class, 'faq'])->middleware([settings::class])->name('frontend.faq');
Route::get('/privacy_policy', [SiteController::class, 'privacy_policy'])->middleware([settings::class])->name('frontend.privacy_policy');

//product_category
Route::get('/product_category/{id}', [DynamicPageController::class, 'loadProductCategory'])->middleware([settings::class])->name("product_category");
Route::get('/products/{id}', [DynamicPageController::class, 'loadProducts'])->middleware([settings::class])->name("products.load");
//dynamic pages
$pages = DB::table('pages')->get();
foreach($pages as $page){
    Route::get('/dPage/'.$page->page_url, [DynamicPageController::class, 'loadPage'])->middleware([settings::class])->name("dynamic".$page->page_url);
}


//backend routes
Route::prefix('admin')->post('/loginUser', [AdminController::class, 'loginUser'])->name('admin.loginUser');
Route::prefix('admin')->get('/register', [AdminController::class, 'register'])->name('admin.register');
Route::prefix('admin')->post('/registerUser', [AdminController::class, 'registerUser'])->name('admin.registerUser');
Route::prefix('admin')->middleware(['auth:web',settings::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

    //general settings
    Route::get('/createSiteSettings', [SettingsController::class, 'create'])->name('create.settings');
    Route::post('/storeSiteSettings', [SettingsController::class, 'store'])->name('store.settings');

    //logo
    Route::get('/uploadLogo', [SettingsController::class, 'uploadLogo'])->name('admin.uploadLogo');
    Route::post('/storeLogo', [SettingsController::class, 'storeLogo'])->name('store.settings.logo');

    //pages
    Route::get('/categories', [PageController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [PageController::class, 'create'])->name('admin.categories.create');
    Route::get('/categories/edit/{id}', [PageController::class, 'edit'])->name('admin.categories.edit');
    Route::get('/categories/delete/{id}', [PageController::class, 'delete'])->name('admin.categories.delete');
    Route::get('/categories/disable/{id}', [PageController::class, 'disable'])->name('admin.categories.disable');
    Route::post('/categories/store', [PageController::class, 'store'])->name('admin.categories.store');
    
    //city wise
    Route::get('/categories/bulkPages/cityWise', [BulkPageController::class, 'cityWise'])->name('admin.categories.cityWise');
    Route::get('/categories/create/cityWise', [BulkPageController::class, 'createCityWise'])->name('admin.categories.createCityWise');
    Route::get('/categories/edit/cityWise/{id}', [BulkPageController::class, 'editCityWise'])->name('admin.categories.editCityWise');
    //state wise
    Route::get('/categories/bulkPages/stateWise', [BulkPageController::class, 'stateWise'])->name('admin.categories.stateWise');
    Route::get('/categories/create/stateWise', [BulkPageController::class, 'createStateWise'])->name('admin.categories.createStateWise');
    Route::get('/categories/edit/stateWise/{id}', [BulkPageController::class, 'editStateWise'])->name('admin.categories.editStateWise');
    //country wise
    Route::get('/categories/bulkPages/countryWise', [BulkPageController::class, 'countryWise'])->name('admin.categories.countryWise');
    Route::get('/categories/create/countryWise', [BulkPageController::class, 'createCountryWise'])->name('admin.categories.createCountryWise');
    Route::get('/categories/edit/countryWise/{id}', [BulkPageController::class, 'editCountryWise'])->name('admin.categories.editCountryWise');
    
    Route::post('/categories/storeBulkPages/{location}', [BulkPageController::class, 'storeBulkPages'])->name('admin.categories.storeCountryWise');

    //products
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::get('/products/disable/{id}', [ProductController::class, 'disable'])->name('admin.products.disable');

    //product images
    Route::get('/products/images', [ProductImageController::class, 'index'])->name('admin.products.images.index');
    Route::get('/products/images/create', [ProductImageController::class, 'create'])->name('admin.products.images.create');
    Route::post('/products/images/store', [ProductImageController::class, 'store'])->name('admin.products.images.store');
    Route::get('/products/images/disable/{id}', [ProductImageController::class, 'disable'])->name('admin.products.images.disable');

    //product categories
    Route::get('/products/categories', [ProductCategoryController::class, 'index'])->name('admin.products.categories.index');
    Route::get('/products/categories/create', [ProductCategoryController::class, 'create'])->name('admin.products.categories.create');
    Route::get('/products/categories/edit/{id}', [ProductCategoryController::class, 'edit'])->name('admin.products.categories.edit');
    Route::post('/products/categories/store', [ProductCategoryController::class, 'store'])->name('admin.products.categories.store');
    Route::get('/products/categories/delete/{id}', [ProductCategoryController::class, 'delete'])->name('admin.products.categories.delete');
    Route::get('/products/categories/disable/{id}', [ProductCategoryController::class, 'disable'])->name('admin.products.categories.disable');

    //enquiries
    Route::get('/enquiries', [EnquiriesController::class, 'index'])->name('admin.enquiries.index');
    Route::get('/enquiries/delete/{id}', [EnquiriesController::class, 'delete'])->name('admin.enquiries.delete');
    
    //Email settings
    Route::get('/emailSettings', [EmailTemplateController::class, 'index'])->name('admin.emailSettings');
    Route::get('/emailSettings/template/create', [EmailTemplateController::class, 'create'])->name('admin.emailSettings.template.create');
    Route::get('/emailSettings/template/edit/{id}', [EmailTemplateController::class, 'edit'])->name('admin.emailSettings.template.edit');
    Route::get('/emailSettings/template/delete/{id}', [EmailTemplateController::class, 'delete'])->name('admin.emailSettings.template.delete');
    Route::post('/emailSettings/template/store', [EmailTemplateController::class, 'store'])->name('admin.emailSettings.template.store');
    //cities
    Route::get('/citiesSettings', [SettingsController::class, 'citiesSettings'])->name('admin.cities.create');
    Route::post('/storeCities', [SettingsController::class, 'storeCities'])->name('admin.cities.storeCities');
    //states
    Route::get('/statesSettings', [SettingsController::class, 'statesSettings'])->name('admin.states.create');
    Route::post('/storeStates', [SettingsController::class, 'storeStates'])->name('admin.cities.storeStates');
    //countries
    Route::get('/countriesSettings', [SettingsController::class, 'countriesSettings'])->name('admin.countries.create');
    Route::post('/storeCountries', [SettingsController::class, 'storeCountries'])->name('admin.cities.storeCountries');
    //account settings
    Route::get('/accountSettings', [AdminController::class, 'accountSettings'])->name('admin.accountSettings');

    //blog settings
    Route::get('/blogSettings', [BlogController::class, 'index'])->name('admin.blogSettings');
    Route::get('/blogSettings/blogs/create', [BlogController::class, 'createBlog'])->name('admin.blogSettings.createBlog');
    Route::get('/blogSettings/blogs/edit/{id}', [BlogController::class, 'editBlog'])->name('admin.blogSettings.editBlog');
    Route::get('/blogSettings/blogs/delete/{id}', [BlogController::class, 'deleteBlog'])->name('admin.blogSettings.deleteBlog');
    Route::post('/blogSettings/blogs/store', [BlogController::class, 'storeBlogPost'])->name('admin.blogSettings.storeBlogPost');

    //blog categories
    Route::get('/blogSettings/categories', [BlogController::class, 'listCategories'])->name('admin.blogSettings.blogCategories');
    Route::get('/blogSettings/categories/create', [BlogController::class, 'createCategory'])->name('admin.blogSettings.createCategory');
    Route::get('/blogSettings/categories/edit/{id}', [BlogController::class, 'editCategory'])->name('admin.blogSettings.editCategory');
    Route::get('/blogSettings/categories/delete/{id}', [BlogController::class, 'deleteCategory'])->name('admin.blogSettings.deleteCategory');
    Route::post('/blogSettings/categories/store', [BlogController::class, 'storeCategory'])->name('admin.blogSettings.storeCategory');

    //blog tags
    Route::get('/blogSettings/tags', [BlogController::class, 'listTags'])->name('admin.blogSettings.blogTags');
    Route::get('/blogSettings/tags/create', [BlogController::class, 'createTag'])->name('admin.blogSettings.createTag');
    Route::get('/blogSettings/tags/edit/{id}', [BlogController::class, 'editTag'])->name('admin.blogSettings.editTag');
    Route::get('/blogSettings/tags/delete/{id}', [BlogController::class, 'deleteTag'])->name('admin.blogSettings.deleteTag');
    Route::post('/blogSettings/tags/store', [BlogController::class, 'storeTag'])->name('admin.blogSettings.storeTag');
});