<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BulkPage;
use App\Models\City;
use App\Models\Country;
use App\Models\Pages;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BulkPageController extends Controller
{
    public function cityWise(Request $request){
        if ($request->ajax()) {
            $orders = DB::table('bulk_pages')
                ->distinct()
                ->where('page_category_location','=','city')
                ->select('id', 'page_name', 'page_status');

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('page_name', function ($query, $order) {
                    $query->orderBy('page_name', $order);
                })
                
                ->orderColumn('page_status', function ($query, $order) {
                    $query->orderBy('page_status', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/categories/edit/cityWise/{$row->id}";
                    $deleteUrl = "/admin/categories/cityWise/delete/{$row->id}";
                    $disableUrl = "/admin/categories/cityWise/disable/{$row->id}";

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
        return view('backend.bulk.city_wise',['settings' => $request->settings]);
    }
    public function stateWise(Request $request){
        if ($request->ajax()) {
            $orders = DB::table('bulk_pages')
                ->distinct()
                ->where('page_category_location','=','state')
                ->select('id', 'page_name', 'page_status');

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('page_name', function ($query, $order) {
                    $query->orderBy('page_name', $order);
                })
                
                ->orderColumn('page_status', function ($query, $order) {
                    $query->orderBy('page_status', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/categories/edit/stateWise/{$row->id}";
                    $deleteUrl = "/admin/categories/delete/stateWise/{$row->id}";
                    $disableUrl = "/admin/categories/disable/stateWise/{$row->id}";

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
        return view('backend.bulk.state_wise',['settings' => $request->settings]);
    }
    public function countryWise(Request $request){
        if ($request->ajax()) {
            $orders = DB::table('bulk_pages')
                ->distinct()
                ->where('page_category_location','=','country')
                ->select('id', 'page_name', 'page_status');

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('page_name', function ($query, $order) {
                    $query->orderBy('page_name', $order);
                })
                
                ->orderColumn('page_status', function ($query, $order) {
                    $query->orderBy('page_status', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/categories/edit/countryWise/{$row->id}";
                    $deleteUrl = "/admin/categories/delete/countryWise/{$row->id}";
                    $disableUrl = "/admin/categories/disable/countryWise/{$row->id}";

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
        return view('backend.bulk.country_wise',['settings' => $request->settings]);
    }
    public function storeBulkPages(Request $request,$location)
    {
        $data = $request->all();
        unset($data['settings']);
        if($location == 'city'){
            $allLocations = City::where('is_active', 1)->get();
        }else if($location == 'state'){
            $allLocations = State::where('is_active', 1)->get();
        }else if($location =='country'){
            $allLocations = Country::where('is_active', 1)->get();
        }
        //dd($data);
        if (!empty($data['meta_tags'])) {
            $metaTags = $data['meta_tags'];
            $processedMetaTags = $this->processMetaTags($metaTags);
        }
        $page_banner = "";
        $page_sliders = [];
        $process = "";
        $saveCount = [];
        if (!empty($data['id'])) {
            $bulkPage = BulkPage::where('id', $data['id'])->first();
        } else {
            $bulkPage = new BulkPage();
            $bulkPage->page_name = $data['page_name'];
        }
        
        $bulkPage->page_parent = $data['page_parent'];
        $bulkPage->page_status = $data['page_status'];
        $bulkPage->page_display_order = $data['page_display_order'];
        $bulkPage->seo_title = $data['seo_title'];
        $bulkPage->seo_desc = $data['seo_desc'];
        $bulkPage->seo_keywords = $data['seo_keywords'];
        $bulkPage->page_headings = $data['page_headings'];
        $bulkPage->page_desc = $data['page_desc'];
        $bulkPage->page_category_location = $location;
        $bulkPage->page_schema = $data['page_schema'];
        if (!empty($data['meta_tags'])) {
            $bulkPage->page_meta = json_encode($processedMetaTags);
        }
        if ($bulkPage->save()) {
            $page_name = $bulkPage->page_name;
            foreach ($allLocations as $key => $loc) {
                if (!empty($data['id'])) {
                    $page = Pages::where('page_city', $loc->city_name)->first();
                    if(empty($page->id)){
                        $page = new Pages();
                    }
                    $process = "updated";
                } else {
                    $page = new Pages();
                    $process = "created";
                }
                if (!empty($data['page_banner'])) {
                    $logo = $request->file('page_banner');
                    $logoName = time() . '.' . $logo->getClientOriginalExtension();
                    $page_banner = $logo->storeAs('uploads', $logoName, 'public');
                    $page->page_banner = $page_banner;
                }
                if (!empty($data['pageSliders'])) {
                    $page_sliders = $request->file('pageSliders');
                    $sliderArr = [];
                    foreach ($page_sliders as $slider) {
                        $sliderName = time() . '.' . $slider->getClientOriginalExtension();
                        $slide = $slider->storeAs('uploads', $sliderName, 'public');
                        array_push($sliderArr, $slide);
                    }
                    $page->page_sliders = json_encode($sliderArr);
                }
                if($location == 'city'){
                    $page->page_name = str_replace('city_name', $loc->city_name, $page_name);
                    $page->page_city = $loc->city_name;
                }else if($location == 'state'){
                    $page->page_name = str_replace('state_name', $loc->state_name, $page_name);
                    $page->page_city = $loc->state_name;
                }else if($location == 'country'){
                    $page->page_name = str_replace('country_name', $loc->country_name, $page_name);
                    $page->page_city = $loc->country_name;
                }
                $page->page_url = $this->slugify(strtolower($page->page_name));
                
                $page->page_parent = $data['page_parent'];
                $page->page_status = $data['page_status'];
                $page->page_display_order = $data['page_display_order'];
                $page->seo_title = $data['seo_title'];
                $page->seo_desc = $data['seo_desc'];
                $page->seo_keywords = $data['seo_keywords'];
                $page->page_headings = $data['page_headings'];
                $page->page_desc = $data['page_desc'];
                
                $page->page_schema = $data['page_schema'];
                if (!empty($data['meta_tags'])) {
                    $page->page_meta = json_encode($processedMetaTags);
                }
                if ($page->save()) {
                    array_push($saveCount, $loc->id);
                }
            }
            if (count($saveCount) == count($allLocations)) {
                Artisan::call('optimize');
                return redirect()->back()->with('success', "Page $process successfully.");
            } else {
                return redirect()->back()->with('error', "Page not $process.");
            }
        }

    }
    public function processMetaTags($metaTags)
    {
        $processedMetaTags = [];
        for ($i = 0; $i < count($metaTags); $i += 2) {
            // Combine 'name' and 'value' into a single array.
            if (isset($metaTags[$i]['name'], $metaTags[$i + 1]['value'])) {
                $processedMetaTags[] = [
                    'name' => $metaTags[$i]['name'],
                    'value' => $metaTags[$i + 1]['value'],
                ];
            }
        }
        return $processedMetaTags;
    }
    public function createCityWise(Request $request)
    {
        $parents = Pages::where('page_parent', 0)->get();
        $cities = City::all();
        return view('backend.pages.createCityWise', ['settings' => $request->settings,'parents' => $parents, 'cities' => $cities,'page' => null]);
    }
    public function editCityWise(Request $request,$id)
    {
        $bulkPage = BulkPage::find($id)->first();
        $parents = Pages::where('page_parent', 0)->get();
        $cities = City::all();
        return view('backend.pages.createCityWise', ['settings' => $request->settings,'parents' => $parents, 'page' => $bulkPage, 'cities' => $cities]);
    }
    public function createStateWise(Request $request)
    {
        $parents = Pages::where('page_parent', 0)->get();
        $state = State::all();
        return view('backend.pages.createStateWise', ['settings' => $request->settings,'parents' => $parents, 'states' => $state,'page' => null]);
    }
    public function editStateWise(Request $request,$id)
    {
        $bulkPage = BulkPage::find($id)->first();
        $parents = Pages::where('page_parent', 0)->get();
        $state = State::all();
        return view('backend.pages.createStateWise', ['settings' => $request->settings,'page' => $bulkPage,'parents' => $parents, 'states' => $state]);
    }
    public function createCountryWise(Request $request)
    {
        $parents = Pages::where('page_parent', 0)->get();
        return view('backend.pages.createCountryWise', ['settings' => $request->settings,'parents' => $parents,'page' => null]);
    }
    public function editCountryWise(Request $request,$id)
    {
        $bulkPage = BulkPage::find($id)->first();
        $parents = Pages::where('page_parent', 0)->get();
        $state = State::all();
        return view('backend.pages.createCountryWise', ['settings' => $request->settings,'page' => $bulkPage,'parents' => $parents, 'states' => $state]);
    }
}
