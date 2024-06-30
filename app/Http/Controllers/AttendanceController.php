<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index()
    {
        $logs = [];
        foreach (getSundays() as $sunday) {
            $log = DB::table('attendance_logs')->whereDate('created_at', $sunday)->count();
            $logs[$sunday] = $log;
        }
        return view('attendance.index', compact('logs'));
    }

    public function add()
    {
        $members = DB::table('members')
            ->orderBy('fullname')
            ->get(['fullname', 'profileImg', 'membership_no']);

        return view('attendance.record', compact('members'));
    }

    public function record(Request $request)
    {
        Validator::make($request->all(), ['present' => 'required'])->validate();

        foreach ($request->present as $member) {
            $present = DB::table('attendance_logs')->where('member_id', $member)->whereDate('created_at', Carbon::today()->toDateString())->exists();
            if (!$present) {
                DB::table('attendance_logs')->insert([
                    'member_id' => $member,
                    'created_at' => Carbon::now()->toDateTimeString()
                ]);
            }
        }
        return redirect(route('attendance'))->with('success', "Attendance recorded");
    }
}
