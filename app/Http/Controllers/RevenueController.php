<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RevenueController extends Controller
{
    public function index()
    {
        $revenues = DB::table('revenue')
            ->join('users', 'users.mask', 'revenue.user_id')
            ->select('revenue.*', 'users.name')
            ->orderByDesc('created_at')
            ->get();
        $monthSum = DB::table('revenue')->whereMonth('created_at', Carbon::now()->month)->sum('amount');

        return view('revenue.list', compact('revenues', 'monthSum'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), ['amount' => 'required|numeric']);
        $request['user_id'] = Auth::user()->mask;
        $request['created_at'] = Carbon::now()->toDateTimeString();
        if ($request->type == 'other') {
            $request['type'] = $request->other_type;
        }

        DB::table('revenue')->insert($request->except(['_token', 'other_type']));

        return back()->with('success', "Revenue recored");
    }

    public function delete($id)
    {
        DB::table('revenue')->where('id', $id)->delete();

        return back()->with('success', "Records deleted");
    }

    public function revenuePy()
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $amount = DB::table('revenue')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at', $i)->sum('amount');
            array_push($months,$amount);
        }
        return $months;
    }
}
