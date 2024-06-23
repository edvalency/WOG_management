<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Welfare;
use Illuminate\Http\Request;
use App\Models\welfareExpense;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class WelfareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $all = Member::all('id', 'fullname', 'mask');

        foreach ($all as $member) {
            $logs = DB::table('welfares')->where('member_id', $member->mask);
            $payments = $logs->sum('amount');
            $last = $logs->latest('updated_at')->pluck('updated_at')->first();
            $member['payments'] = $payments;
            $member['last'] = $last;
        }
        return view('welfare.welfare')->with('member', $all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {
        // $name = Crypt::decrypt($);
        // $data = DB::table('members')
        //     ->where('fullname', '=', $request->input('search'))
        //     ->get();
        $data = Member::where('fullname', 'like', "%" . $request->input('search') . "%")->select('fullname')->get();
        return view('welfare.welfare')->with('member', $data);
    }

    public function supportsearch(Request $request)
    {
        $data = welfareExpense::where('fullname', 'like', "%" . $request->input('search') . "%")->select('fullname')->get();
        return view('welfare.expenses')->with('member', $data);
    }

    public function single($gtt)
    {

        $member = DB::table("members")->where('mask', $gtt)->first();

        $data = DB::table('welfares')
            ->where('member_id', $member->mask)
            ->join('members', 'members.mask', 'welfares.member_id')
            ->select('members.fullname', 'welfares.amount', 'welfares.created_at', 'welfares.id')
            ->orderByDesc('created_at')
            ->get();

        return view('welfare.details', ['records' => $data, 'member' => $member]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = Carbon::now()->toTimeString();
        $date = Carbon::parse($request->input('date').' '.$time);

        DB::table("welfares")->insert([
            'member_id' => $request->member_id,
            'created_at' => $date->toDateTimeString(),
            'amount' => $request->input('amount'),
            'recorded_by' => Auth::user()->mask,
            'updated_at' => Carbon::now()->toDateString()
        ]);

        $member = Member::where('mask', $request->member_id)->first();
        $message = "Your welfare payment for the month of " . $date->monthName ." ".  $date->year." has been made.";

        // sendText($member->contact, $message);

        return redirect()->back()->with('success', "Recorded");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Welfare  $welfare
     * @return \Illuminate\Http\Response
     */
    public function show(Welfare $welfare)
    {
        //
    }

    public function expenses()
    {

        $data = DB::table('welfare_expenses')
            ->join('members', 'members.mask', 'welfare_expenses.member_id')
            ->select('members.fullname', 'welfare_expenses.*')
            ->get();
        // dd($data);
        return view('welfare.expenses', ['member' => $data]);
    }

    public function welfare_support($id)
    {
        $member = DB::table('members')->where('mask', $id)->first();

        $records = DB::table('members')
            ->where('mask', $id)
            ->join('welfare_expenses', 'welfare_expenses.member_id', 'members.mask')
            ->select('members.fullname', 'welfare_expenses.*')
            ->get();

        return view('welfare.expensedetails', compact('records', 'member'));
    }

    public function welstore(Request $request)
    {
        // dd($request->all());
        DB::table('welfare_expenses')->insert([
            'member_id' => $request->member_id,
            'reason' => $request->purpose,
            'amount' => $request->input('amount'),
            'recorded_by' => Auth::user()->mask,
            'created_at' => Carbon::parse($request->input('date'))->toDateString(),
        ]);

        return redirect()->back()->with('success', "Support recorded");
    }

    public function support_delete($record)
    {
        DB::table('welfare_expenses')->where('id', $record)->delete();

        return redirect()->back()->with('success', "Support recorded");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Welfare  $welfare
     * @return \Illuminate\Http\Response
     */
    public function edit(Welfare $welfare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Welfare  $welfare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Welfare $welfare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Welfare  $welfare
     * @return \Illuminate\Http\Response
     */
    public function destroy($welfare)
    {
        DB::table('welfares')->where('id', $welfare)->delete();

        return redirect()->back()->with('success', 'Record deleted');
    }
}
