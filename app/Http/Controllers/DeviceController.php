<?php
/*
 * Created by Beatific Angel
 *  20222/3/22 11.00am
 * */
namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{

    public function index()
    {
        $devices = device::all();
        $device_cnt = device::all()->count();
        return view('device.index', ['devices' => $devices, 'count' => $device_cnt]);
    }

    public function create()
    {
        $groups = group::all();
        return view('device.create', ['groups' => $groups]);
    }


    public function store(Request $request)
    {

        $name = $request->input('devicename');
        $groupname = $request->input('groupname');
        $ipaddress = $request->input('ipaddress');
        $description = $request->input('devicedescription');

        $group = DB::select("select * from groups where name='$groupname'");
        $groupid = $group[0]->id;

        $device = new Device([
            'name' => $name,
            'groupid' => $groupid,
            'ipaddress' => $ipaddress,
            'description' => $description
        ]);
        $device->save();

        return redirect()->back()->with("success", "New Device has been created.");
    }

    public function edit($id)
    {
        $device = Device::where('id', '=', $id)->get();
        $groups = group::all();
        return view('device.edit', ['device' => $device[0], 'groups' => $groups]);
    }


    public function update(Request $request)
    {

        $id = $request->input('deviceid');
        $name = $request->input('devicename');
        $groupname = $request->input('groupname');
        $ipaddress = $request->input('ipaddress');
        $description = $request->input('devicedescription');

        $group = DB::select("select * from groups where name='$groupname'");
        $groupid = $group[0]->id;

        $device = Device::findOrFail($id);

        $device->name = $name ;
        $device->groupid = $groupid;
        $device->ipaddress = $ipaddress;
        $device->description = $description;
        $device->save();

        return redirect()->back()->with("success", "The Device has been updated.");
    }

    public function delete($id)
    {
        $device_query = "delete from devices where id = '$id'";
        $device_query_res = DB::select($device_query);
        return redirect()->back()->with("success", "The Device has been deleted.");
    }


}
