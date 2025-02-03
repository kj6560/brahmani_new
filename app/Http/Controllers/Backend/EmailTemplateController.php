<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EmailTemplateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = DB::table('email_templates')
                ->distinct()
                
                ->select('email_templates.id as id', 'email_templates.template_name as template_name', 'email_templates.status as status');

            return DataTables::of($orders)
                ->orderColumn('email_templates.id', function ($query, $order) {
                    $query->orderBy('email_templates.id', $order);
                })
                ->orderColumn('email_templates.template_name', function ($query, $order) {
                    $query->orderBy('email_templates.template_name', $order);
                })
                ->orderColumn('email_templates.status', function ($query, $order) {
                    $query->orderBy('email_templates.status', $order);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = "/admin/emailSettings/template/edit/{$row->id}";
                    $deleteUrl = "/admin/emailSettings/template/delete/{$row->id}";

                    $editButton = '';
                    $deleteButton = '';

                    $editButton = "<a href='$editUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Edit</a>";
                    $deleteButton = "<a href='$deleteUrl' class='dropdown-item'><i class='bx bx-edit-alt me-2'></i> Delete</a>";

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
        return view('backend.email_template.index', ['settings' => $request->settings]);
    }
    public function create(Request $request)
    {
        return view('backend.email_template.create',['settings' => $request->settings]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'template_name' => 'required',
            'template_content' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'template_name' => $request->template_name,
            'template_content' => $request->template_content,
            'status' => $request->status,
        ];
        if(!empty($request->id)){
            $email = EmailTemplate::find($request->id);
            $email->update($data);
        }else{  
            $email = EmailTemplate::create($data);
        }
        return redirect()->back()->with('success', 'Email template created successfully');
    }
    public function show($id)
    {
        $email = EmailTemplate::find($id);
        return view('backend.email_template.show', ['email' => $email]);
    }
    public function edit(Request $request,$id)
    {
        $template = EmailTemplate::find($id);
        return view('backend.email_template.create', ['template' => $template,'settings' => $request->settings]);
    }

    public function delete($id)
    {
        $template = EmailTemplate::find($id);
        $template->delete();
        return redirect()->back()->with('success', 'Email deleted successfully');
    }
}
