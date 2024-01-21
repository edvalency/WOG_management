<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    //
    public function index()
    {
        return view();
    }

    public function mark_attendance($attendee)
    {
        DB::table('attendance_logs')->insert(['attendee_id' => $attendee, 'created_at' => Carbon::now()->toDateTimeString()]);
        return back()->with('success','Member marked as present');
    }

    public function unmark_attendance($attendee)
    {
        DB::table('attendance_logs')->where('attendee_id', $attendee)->whereDate('created_at', Carbon::today()->toDateString())->delete();
        return back()->with('success','Member unmarked as present');
    }

}
