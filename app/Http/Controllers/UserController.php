<?php

namespace App\Http\Controllers;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('admin.users.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $user = new User([
            'first_name' => $request->input('firts_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'activated' => 1,
            'password' => Hash::make($request->input('password')),
        ]);
        $user->save();

        return redirect()->back()->with("status", "Your user has been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \CreatyDev\Domain\Users\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CreatyDev\Domain\Users\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        print_r('asdfasdfasdfasdf');exit;
        $this->authorize('update', User::class);

        $user = User::findOrFail($id);
        return view('admin.users.user.edit', compact('user'));
    }

    public function destroy($id)
    {

        $user_query = "delete from users where id = '$id'";
        $user_query_res = DB::select($user_query);
        return view('admin.users');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \CreatyDev\Domain\Users\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', User::class);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->first_name = $request->input('first_name') ;
        $user->last_name = $request->input('last_name') ;
        $user->username = $request->input('username') ;
        $user->email = $request->input('email') ;
        $user->phone = $request->input('phone') ;
        $user->save();


        return redirect()->back()->with("status", "User has been updated.");
    }



}
