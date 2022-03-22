<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $name = $request->input('groupname');
        $owner = $request->input('groupowner');
        $description = $request->input('groupdescription');

        $group = new Group([
            'name' => $name,
            'owner' => $owner,
            'description' => $description
        ]);
        $group->save();

        return redirect()->back()->with("success", "New Group has been created.");
    }

    public function edit($id)
    {
        $group = Group::where('id', '=', $id)->get();

        return view('group.edit', ['groups' => $group[0]]);
    }


    public function update(Request $request)
    {
        $id = $request->input('groupid');
        $name = $request->input('groupname');
        $owner = $request->input('groupowner');
        $description = $request->input('groupdescription');
        $group = Group::findOrFail($id);

        $group->name = $name ;
        $group->owner = $owner;
        $group->username = $owner;
        $group->description = $description;

        $group->save();

        return redirect()->back()->with("success", "New Group has been created.");

    }

    public function delete(User $user)
    {

    }


}
