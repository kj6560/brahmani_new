<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = DB::table('website_settings')
                ->distinct()
                ->select('id', 'settings_key', 'settings_value', 'is_active');

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('settings_key', function ($query, $order) {
                    $query->orderBy('settings_key', $order);
                })

                ->orderColumn('settings_value', function ($query, $order) {
                    $query->orderBy('settings_value', $order);
                })

                ->orderColumn('is_active', function ($query, $order) {
                    $query->orderBy('is_active', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/siteSettings/edit/{$row->id}";
                    $deleteUrl = "/admin/siteSettings/delete/{$row->id}";
                    $viewUrl = "/admin/siteSettings/show/{$row->id}";

                    $editButton = '';
                    $deleteButton = '';
                    $viewButton = '';

                    $editButton = "<a href='$editUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Edit</a>";

                    $viewButton = "<a href='$viewUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> View</a>";

                    $deleteButton = "<a href='$deleteUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Delete</a>";

                    return "
                    <div class='dropdown'>
                        <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </button>
                        <div class='dropdown-menu'>
                            $viewButton
                            $editButton
                            $deleteButton
                        </div>
                    </div>
                ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.settings',['settings' => $request->settings]);
    }
    public function create(Request $request)
    {
        $settings = WebsiteSetting::where('is_active', 1)->first();
        return view('backend.settings.createSettings', ['settings' => $request->settings,'setting'=>$settings]);
    }
    public function edit(Request $request, $id)
    {
        return view('backend.settings.createSettings', ['settings' => $request->settings]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['settings']);
        unset($data['_token']);
        
        $settings = WebsiteSetting::where('is_active', 1)->first();
        if (empty($settings->id)) {
            $settings = new WebsiteSetting();
        }
        if (!empty($data['logo'])) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $filePath = $logo->storeAs('uploads', $logoName, 'public');
        }
        foreach ($data as $key => $value) {
            if ($key != "logo" && !empty($value)) {
                $settings->$key = $value;
            } else if ($key == "logo") {
                $settings->$key = $filePath;
            }
        }
        $settings->save();
        return redirect()->back()->with('success', 'Settings created successfully.');
    }
    

    public function citiesSettings(Request $request)
    {
        $cities = City::all();
        return view('backend.settings.citiesSettings', ['cities' => $cities,'settings' => $request->settings]);
    }
    public function storeCities(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $active = [];
        $cities =City::all();
        if(!empty($data['status'])){
            $active = array_keys($data['status']);
        }else{
            $active = [];
        }
        
        foreach ($cities as $city) {
            if(in_array($city->id,$active)){
                $city->is_active = 1;
            }else{
                $city->is_active = 0;
            }
            $city->save();
        }
        return redirect()->back()->with('success', 'Cities updated successfully.');
    }
    public function statesSettings(Request $request)
    {
        $states = State::all();
        return view('backend.settings.statesSettings', ['states' => $states,'settings' => $request->settings]);
    }
    public function storeStates(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $active = [];
        $states =State::all();
        if(!empty($data['status'])){
            $active = array_keys($data['status']);
        }else{
            $active = [];
        }
        
        foreach ($states as $state) {
            if(in_array($state->id,$active)){
                $state->is_active = 1;
            }else{
                $state->is_active = 0;
            }
            $state->save();
        }
        return redirect()->back()->with('success', 'Cities updated successfully.');
    }
    public function countriesSettings(Request $request)
    {
        $countries = Country::all();
        return view('backend.settings.countriesSettings', ['countries' => $countries,'settings' => $request->settings]);
    }
    public function storeCountries(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $active = [];
        $countries =Country::all();
        if(!empty($data['status'])){
            $active = array_keys($data['status']);
        }else{
            $active = [];
        }

        foreach ($countries as $country) {
            if(in_array($country->id, $active)){
                $country->is_active = 1;
            }else{
                $country->is_active = 0;
            }
            $country->save();
        }
        return redirect()->back()->with('success', 'Countries updated successfully.');
    }
}
