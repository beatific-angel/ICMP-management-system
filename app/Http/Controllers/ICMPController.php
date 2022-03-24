<?php
/*
 * Created by Beatific Angel
 *  20222/3/23 9.00am
 * */

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Group;
use App\Models\Status;
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
        $status_lists = Status::all();
        $command = (new PingCommandBuilder('199.38.82.85'));

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

                // Pass the PingCommand instance to Ping and run...
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
                $device_status->save();
            } else {
                $new_status = new Status([
                    'deviceid' => $device->id,
                    'devicename' => $device->name,
                    'groupid' => $device->groupid,
                    'ipaddress' => $device->ipaddress,
                    'status' => $status
                ]);
                $new_status->save();
            }
        }

        $status_result = array();
        $a = &$status_result;
        $a["get_status"] = '';
        if (!empty($device)) {
            $a["get_status"] = view('status.status', ['devices' => $devices, 'devicestatus' => $devicestatus])->render();
        }
        return response()->json($status_result);
    }
}
