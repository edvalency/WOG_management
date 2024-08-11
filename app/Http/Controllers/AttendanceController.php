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
            $mlog = $present->where('attendee_type','members')->count();

            $members = $present->where('attendee_type','members')->pluck('attendee_id')->toArray();
            $m_genders = DB::table('members')->whereIn('membership_no', $members)->orWhereIn('mask',$members)
                ->select(
                    DB::raw('COUNT(CASE WHEN gender = "Male" THEN 1 END) as males'),
                    DB::raw('COUNT(CASE WHEN gender = "Female" THEN 1 END) as females')
                )
                ->first();
            $member_logs[$sunday] = ['total' => $mlog, 'gender' => $m_genders];

            $vlog = DB::table('attendance_logs')->whereDate('created_at', $sunday)->where('attendee_type','visitors')->count();
            $visitors = DB::table('attendance_logs')->whereDate('created_at', $sunday)->where('attendee_type','visitors')->pluck('attendee_id')->toArray();

            $v_genders = DB::table('visitors')->whereIn('mask', $visitors)
                ->select(
                    DB::raw('COUNT(CASE WHEN gender = "Male" THEN 1 END) as males'),
                    DB::raw('COUNT(CASE WHEN gender = "Female" THEN 1 END) as females')
                )
                ->first();

            $visitor_logs[$sunday] = ['total' => $vlog, 'gender' => $v_genders];
        }
        return view('attendance.index', compact('member_logs','visitor_logs'));
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

    public function visitors_present($date)
    {

        $present = DB::table('attendance_logs')->whereDate('attendance_logs.created_at', Carbon::parse($date)->toDateString())
            ->join('visitors', 'visitors.mask', 'attendance_logs.attendee_id')
            ->select('visitors.fullname', 'visitors.contact', 'visitors.gender')->get();

        return view('attendance.visitors', compact('present'));
    }
}
