<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class GroupController extends Controller
{

    public function index()
    {
        $groups = Group::all();
        $groups_cnt = Group::all()->count();
        return view('group.index', ['groups' => $groups, 'count' => $groups_cnt]);
    }

    public function create()
    {
        return view('group.create');
    }


    public function store(Request $request)
    {

    }


    public function updateStatus($user_id, $status)
    {

    }


    public function edit(User $user)
    {

    }


    public function update(Request $request, User $user)
    {

    }

    public function delete(User $user)
    {

    }


}
