<?php
/*
 * Created by Beatific Angel
 *  20222/3/23 9.00am
 * */

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Group;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Acamposm\Ping\Ping;
use Acamposm\Ping\PingCommandBuilder;


class ICMPController extends Controller
{

    public function index()
    {
        $devices = device::whereDate('created_at',Carbon::now())->get();
        foreach ($devices as $key => $device) {
            $ipaddress = $device->ipaddress;
            $status = '';
            if (PHP_OS === 'WINNT') {
                exec("ping -n 3 $ipaddress", $outcome, $status);
                if (0 == $status) {
                    $status = "alive";
                } else {
                    $status = "dead";
                }
            } else if (PHP_OS === 'Linux') {
                $command = (new PingCommandBuilder($ipaddress));
                $ping = (new Ping($command))->run();
                if ($ping->host_status == 'Ok') {
                    $status = "alive";
                } else {
                    $status = "dead";
                }
            }
            $devicestatus[$key] = $status;
            $get_device = DB::select("select * from servicestatus where deviceid='$device->id'");
            if (empty($get_device)) {
                if($status == "alive"){
                    $up_count = 1;
                    $down_count = 0;
                }else {
                    $up_count = 0;
                    $down_count = 1;
                }
                $new_status = new Status([
                    'deviceid' => $device->id,
                    'devicename' => $device->name,
                    'groupid' => $device->groupid,
                    'ipaddress' => $device->ipaddress,
                    'access_count' => 1,
                    'up_count' => $up_count,
                    'down_count' => $down_count,
                    'status' => $status
                ]);
                $new_status->save();
            }
        }
        $status_lists = Status::all();


        return view('status.index', ['status_lists' => $status_lists]);
    }

    public function getstatus()
    {
        $devices = device::all();
        $devicestatus = array();
        foreach ($devices as $key => $device) {
            $ipaddress = $device->ipaddress;
            $status = '';
            if (PHP_OS === 'WINNT') {
                exec("ping -n 3 $ipaddress", $outcome, $status);
                if (0 == $status) {
                    $status = "alive";
                } else {
                    $status = "dead";
                }
            } else if (PHP_OS === 'Linux') {
                $command = (new PingCommandBuilder($ipaddress));
                $ping = (new Ping($command))->run();
                if ($ping->host_status == 'Ok') {
                    $status = "alive";
                } else {
                    $status = "dead";
                }
            }
            $devicestatus[$key] = $status;
            $get_device = DB::select("select * from servicestatus where deviceid='$device->id'");
            if (!empty($get_device)) {
                $status_id = $get_device[0]->id;
                $device_status = Status::findOrFail($status_id);
                $device_status->deviceid = $device->id;
                $device_status->devicename = $device->name;
                $device_status->groupid = $device->groupid;
                $device_status->ipaddress = $device->ipaddress;
                $device_status->status = $status;
                $device_status->access_count = $device_status->access_count + 1;
                if($status == "alive"){
                    $device_status->up_count = $device_status->up_count + 1;
                }else {
                    $device_status->down_count = $device_status->down_count + 1;
                }

                $device_status->save();
            } else {
                if($status == "alive"){
                    $up_count = 1;
                    $down_count = 0;
                }else {
                    $up_count = 0;
                    $down_count = 1;
                }
                $new_status = new Status([
                    'deviceid' => $device->id,
                    'devicename' => $device->name,
                    'groupid' => $device->groupid,
                    'ipaddress' => $device->ipaddress,
                    'access_count' => 1,
                    'up_count' => $up_count,
                    'down_count' => $down_count,
                    'status' => $status
                ]);
                $new_status->save();
            }
        }

        $status_lists = Status::all();

        $status_result = array();
        $a = &$status_result;
        $a["get_status"] = '';
        if (!empty($device)) {
            $a["get_status"] = view('status.status', ['status_lists' => $status_lists])->render();
        }
        return response()->json($status_result);
    }
}
