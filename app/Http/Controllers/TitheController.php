<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tithe;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TitheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Member $member)
    {
        $tithes = DB::table('tithes')
            ->join('members', 'members.mask', 'tithes.member_id')
            ->join('users','users.mask','tithes.recorded_by')
            ->select('members.fullname', 'tithes.amount', 'users.name as recorded_by','tithes.created_at','tithes.id')
            ->get();
        return view('revenue.tithe.list', compact('tithes'));
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
        // dd($data);
        return view('revenue.tithe.tithes')->with('member', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::parse($request->input('date'))->toFormattedDateString();

        DB::table('tithes')->insert([
            'recorded_by' => Auth::user()->mask,
            'member_id' => $request->member_id,
            'created_at' => Carbon::parse($request->date)->toDateString(),
            'date' => $request->date,
            'amount' => $request->input('amount'),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($request->receipt) {
            $member = Member::where('mask', $request->member_id)->first();
            $message = "Your tithe paid on " . $date . " has been recorded.";

            sendText($member->contact, $message);
        }

        return redirect()->back()->with('success', 'Recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function show(Tithe $tithe)
    {
        //
    }

    public function single($gtt)
    {
        $id = Crypt::decrypt($gtt);
        // dd($id);
        $member = DB::table("members")->where('id', $id)->first();

        $data = DB::table('tithes')
            ->where('member_id', $member->id)
            ->get();
        return view('revenue.tithe.details', ['results' => $data, 'name' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function edit(Tithe $tithe)
    {
        //
    }
    // public function search(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Tithe::where('fullname', 'like', "%" . $request->search . "%")->get();
    //         return "hey mama";
    //     }
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tithe $tithe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function destroy($tithe)
    {
        DB::table('tithes')->where('id', $tithe)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }
}
