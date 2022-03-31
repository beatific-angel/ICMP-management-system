<?php

namespace App\Http\Controllers;

use Acamposm\Ping\Ping;
use Acamposm\Ping\PingCommandBuilder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Device;
use App\Models\Group;
use App\Models\Status;
use App\Rules\MatchOldPassword;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        VisitLog::save();
        $this->middleware('auth');
    }


    public function index()
    {
        $usercnt = User::all()->count();
        $groups = Group::all();
        $groups_cnt = Group::all()->count();
        $devices_cnt = Device::all()->count();

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
        $status_lists = Status::where('status', '=', 'dead')
            ->get();

        return view('home',['usercnt' => $usercnt,'groups' => $groups,'groups_cnt' => $groups_cnt,'devices_cnt' => $devices_cnt,'status_lists' => $status_lists, 'devicelists' => $devicelists, 'uplists' => $uplists, 'downlists' => $downlists]);
    }
    public function groupstatus()
    {
        $groups = Group::all();

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
        $status_result = array();
        $a = &$status_result;
        $a["get_status"] = '';
        if (!empty($groups)) {
            $a["get_status"] = view('status.groupstatus', ['groups' => $groups,'devicelists' => $devicelists,'uplists' => $uplists,'downlists' => $downlists])->render();
        }
        return response()->json($status_result);
    }
    public function getProfile()
    {
        return view('profile');
    }
    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'firstname'    => 'required',
            'lastname'     => 'required',
            'phone' => 'required|numeric|digits:10',
        ]);

        try {
            DB::beginTransaction();

            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
            ]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function visitlog(){
        $visitlogs = VisitLog::all();
        // dd($visitlogs);
        return view('visitlog.index', compact('visitlogs'));
    }
}
