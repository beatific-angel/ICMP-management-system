<?php
/*
 * Created by Beatific Angel
 *  20222/3/22 11.00am
 * */
namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Group;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $customers = Customer::all();
        return view('device.create', ['groups' => $groups,'customers' => $customers]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'devicename' => 'required',
        'customername' => 'required',
        'groupname' => 'required',
        'ipaddress' => 'required'
        ]);

        $name = $request->input('devicename');
        $customername = $request->input('customername');
        $groupname = $request->input('groupname');
        $ipaddress = $request->input('ipaddress');
        $description = $request->input('devicedescription');

        $group = DB::select("select * from groups where name='$groupname'");
        $groupid = $group[0]->id;

        $customerget = DB::select("select * from customers where short_name='$customername'");
        $customerid = $customerget[0]->id;

        $device = new Device([
            'name' => $name,
            'customerid' => $customerid,
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
        $customers = Customer::all();
        return view('device.edit', ['device' => $device[0], 'groups' => $groups, 'customers' => $customers]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'devicename' => 'required',
            'customername' => 'required',
            'groupname' => 'required',
            'ipaddress' => 'required'
        ]);

        $id = $request->input('deviceid');
        $customername = $request->input('customername');
        $name = $request->input('devicename');
        $groupname = $request->input('groupname');
        $ipaddress = $request->input('ipaddress');
        $description = $request->input('devicedescription');

        $group = DB::select("select * from groups where name='$groupname'");
        $groupid = $group[0]->id;
        $getcustomer = DB::select("select * from customers where short_name='$customername'");
        $customerid = $getcustomer[0]->id;


        $device = Device::findOrFail($id);

        $device->name = $name ;
        $device->customerid = $customerid;
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
