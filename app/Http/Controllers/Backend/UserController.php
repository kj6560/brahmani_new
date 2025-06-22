<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $orders = DB::table('users')
                ->distinct()
                ->select('id', 'name', 'email', 'user_role');

            return DataTables::of($orders)
                ->orderColumn('id', fn($query, $order) => $query->orderBy('id', $order))
                ->orderColumn('name', fn($query, $order) => $query->orderBy('name', $order))
                ->orderColumn('email', fn($query, $order) => $query->orderBy('email', $order))
                ->orderColumn('user_role', fn($query, $order) => $query->orderBy('user_role', $order))
                ->addColumn('action', function ($row) {
                    $user = User::find(Auth::id());
                    $editUrl = "/admin/users/edit/{$row->id}";
                    $deleteUrl = "/admin/users/delete/{$row->id}";

                    $editButton = "<a href='$editUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Edit</a>";

                    // Conditionally add buttons
                    $disableButton = '';
                    $deleteButton = '';
                    if ($user && $user->user_role == 2) {
                        $deleteButton = "<a href='$deleteUrl' class='dropdown-item'><i class='bx bx-trash me-2'></i> Delete</a>";
                    }

                    return "
            <div class='dropdown'>
                <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </button>
                <div class='dropdown-menu'>
                    $editButton
                    $deleteButton
                </div>
            </div>
        ";
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('backend.users.userList', ['settings' => $request->settings]);
    }
    public function create(Request $request)
    {
        // Logic for creating a new user
        return view('backend.users.create', ['settings' => $request->settings]);
    }
    public function store(Request $request)
    {
        // Logic for storing a new user
        $data = $request->all();
        if(!empty($data['id'])){
            $user = User::find($data['id']);
        }else{
            $user = new User();
        }
        $user->name = $data['name'];
        $user->email = $data['email'];
        if(!empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        $user->user_role = $data['user_role'];
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }
    public function edit($id, Request $request)
    {
        $user = User::findOrFail($id);
        return view('backend.users.create', ['user' => $user, 'settings' => $request->settings]);
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
