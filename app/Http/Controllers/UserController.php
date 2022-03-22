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


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $role_name = $request->input('user_role');
        $role = DB::select("select * from user_role where role_name='$role_name'");
        $role_id = $role[0]->id;

        $user = new User([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'role_id' => $role_id,
            'password' => Hash::make($request->input('password')),
        ]);
        $user->save();

        return redirect()->back()->with("success", "New Customer has been created.");
    }


    public function edit($id)
    {
        $user = User::where('id', '=', $id)->get();
        $roles = Role::all();
        return view('users.edit', ['user' => $user[0],'roles' => $roles]);
    }

    public function delete($id)
    {

        $user_query = "delete from users where id = '$id'";
        $user_query_res = DB::select($user_query);
        return redirect()->back()->with("success", "User has been deleted.");
    }

    public function update(Request $request)
    {

        $id = $request->input('userid') ;
        $user = User::findOrFail($id);

        $user->firstname = $request->input('firstname') ;
        $user->lastname = $request->input('lastname') ;
        $user->username = $request->input('username') ;
        $user->email = $request->input('email') ;
        $user->phone = $request->input('phone') ;
        $user->role_id = 1;
        $user->password = Hash::make($request->input('password'));
        $user->save();


        return redirect()->back()->with("success", "User has been updated.");
    }



}
