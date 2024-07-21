<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tithe;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $all = Member::all('id', 'fullname');
        return view('tithe.tithes')->with('member', $all);
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
        return view('tithe.tithes')->with('member', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tithes')->insert([
            'member_id' => $request->input('id'), 'created_at' => Carbon::now()->toDateString(),
            'date' => $request->date,
            'amount' => $request->input('amount'),
            'updated_at' => Carbon::now()->toDateString()
        ]);
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
        return view('tithe.details', ['results' => $data, 'name' => $member]);
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
    public function destroy( $tithe)
    {
        DB::table('tithes')->where('id', $tithe)->delete();
       return redirect()->back()->with('success', 'Deleted');
    }
}
