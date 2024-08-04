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
            $present = DB::table('attendance_logs')->whereDate('created_at', $sunday);
            $log = $present->count();

            $members = $present->pluck('member_id')->toArray();
            $genders = DB::table('members')->whereIn('membership_no', $members)
                ->select(
                    DB::raw('COUNT(CASE WHEN gender = "Male" THEN 1 END) as males'),
                    DB::raw('COUNT(CASE WHEN gender = "Female" THEN 1 END) as females')
                )
                ->first();
            $logs[$sunday] = ['total' => $log, 'gender' => $genders];
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

    public function members_present($date)
    {

        $present = DB::table('attendance_logs')->whereDate('attendance_logs.created_at', Carbon::parse($date)->toDateString())
            ->join('members', 'members.membership_no', 'attendance_logs.member_id')
            ->select('members.fullname', 'members.contact', 'members.profileImg')->get();

        return view('attendance.members', compact('present'));
    }
}
