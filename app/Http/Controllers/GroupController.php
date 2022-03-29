<?php
/*
 * Created by Beatific Angel
 *  20222/3/22 5.30 am
 * */
namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Group;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{

    public function index()
    {
        $groups = Group::all();
        $groups_cnt = Group::all()->count();

        $devicelists =array();
        $uplists =array();
        $downlists =array();

        foreach ($groups as $key => $group) {
            $groupid = $group->id;

            $devicelists[$key] = Device::where('groupid', '=', $groupid)->get()->count();

            $uplists[$key] = Status::where('groupid', '=', $groupid)
                ->where('status', '=', 'alive')
                ->get()->count();

            $downlists[$key] = Status::where('groupid', '=', $groupid)
                ->where('status', '=', 'dead')
                ->get()->count();
        }

        return view('group.index', ['groups' => $groups, 'devicelists' => $devicelists, 'uplists' => $uplists, 'downlists' => $downlists]);
    }

    public function create()
    {
        return view('group.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'groupname' => 'required',
            'groupowner' => 'required'
        ]);
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
        $this->validate($request, [
            'groupname' => 'required',
            'groupowner' => 'required'
        ]);
        $id = $request->input('groupid');
        $name = $request->input('groupname');
        $owner = $request->input('groupowner');
        $description = $request->input('groupdescription');
        $group = Group::findOrFail($id);

        $group->name = $name ;
        $group->owner = $owner;
        $group->description = $description;

        $group->save();

        return redirect()->back()->with("success", "The Group has been Updated.");

    }

    public function delete($id)
    {
        $group_query = "delete from groups where id = '$id'";
        $group_query_res = DB::select($group_query);
        return redirect()->back()->with("success", "The Group has been deleted.");
    }


}
