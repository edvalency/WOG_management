<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    public function index(){
        $revenues = DB::table('revenue')
        ->join('users','users.mask','revenue.user_id')
        ->select('revenue.*','users.name')
        ->get();

        return view('revenue.list',compact('revenues'));

    }

    public function store(Request $request) {
        $request['user_id'] = Auth::user()->mask;
        $request['created_at'] = Carbon::now()->toDateTimeString();

        DB::table('revenue')->insert($request->except(['_token']));

        return back()->with('success',"Revenue recored");
    }
}
