<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class VisitorsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = DB::table('visits')
                ->distinct()
                ->select('id', 'user_id', 'ip_address', 'url', 'created_at');

            return DataTables::of($orders)
                ->orderColumn('id', function ($query, $order) {
                    $query->orderBy('id', $order);
                })
                ->orderColumn('user_id', function ($query, $order) {
                    $query->orderBy('user_id', $order);
                })
                ->orderColumn('ip_address', function ($query, $order) {
                    $query->orderBy('ip_address', $order);
                })
                ->orderColumn('url', function ($query, $order) {
                    $query->orderBy('url', $order);
                })
                ->orderColumn('created_at', function ($query, $order) {
                    $query->orderBy('created_at', $order);
                })
               
                ->make(true);
        }
        return view('backend.visitors.index', ['settings' => $request->settings]);
    }
}
