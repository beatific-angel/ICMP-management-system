<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;


class RoleController extends Controller
{

    public function index(Request $request)
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $role = new Role([
            'role_name' => $request->input('role_name'),
            'role_description' => $request->input('role_description')
        ]);
        $role->save();

        return redirect()->back()->with("success", "New Role has been created.");
    }


    public function edit($id)
    {
        $role = Role::where('id', '=', $id)->get();
        return view('roles.edit', ['role' => $role[0]]);
    }

    public function delete($id)
    {
        $role_query = "delete from user_role where id = '$id'";
        $role_query_res = DB::select($role_query);
        return redirect()->back()->with("success", "Role has been deleted.");
    }

    public function update(Request $request)
    {

        $id = $request->input('role_id') ;
        $role = Role::findOrFail($id);

        $role->role_name = $request->input('role_name') ;
        $role->role_description = $request->input('role_description') ;
        $role->save();


        return redirect()->back()->with("success", "Role has been updated.");
    }



}
