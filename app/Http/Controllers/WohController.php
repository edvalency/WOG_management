<?php

namespace App\Http\Controllers;

use App\Models\woh;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class WohController extends Controller
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

    public function index()
    {
        $wohmem = Member::where('dept', 'Women of honour')->get();
        // dd($gcmem);
        return view('woh.woh_members',['data'=> $wohmem]);
    }

    public function woh_dues(){

        $data = DB::table('members')
        ->where('dept','Women of Honour')
        ->get();
        return view('woh.woh_dues', ['member'=>$data]);
    }
    
    public function woh_expenses(){

        $expenses = DB::table('wohs_expenses')->get();

        return view('woh.expenses',['expense'=>$expenses]);
    }

    // public function single($id){
    //     $name = Crypt::decrypt($id);

    //     $data = DB::table('')
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('wohs_dues')->updateOrInsert(
            ['member_id'=>$request->input('id'), 'created_at'=>Carbon::now()->toDateString()],
            [
            'amount'=>$request->input('amount'),
            'updated_at' => Carbon::now()->toDateString()
        ]);
        return redirect()->back()->with('success', 'Dues Recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\woh  $woh
     * @return \Illuminate\Http\Response
     */
    public function show($gtt)
    {
         //
         $member = Crypt::decrypt($gtt);

         $membername = DB::table('members')->where('id', $member)->first();

         $data = DB::table('wohs_dues')
             ->where('member_id', $member)
             ->get();

         return view('woh.duesdetails', ['results' => $data, 'name' => $membername]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\woh  $woh
     * @return \Illuminate\Http\Response
     */
    public function edit(woh $woh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\woh  $woh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, woh $woh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\woh  $woh
     * @return \Illuminate\Http\Response
     */
    public function destroy(woh $woh)
    {
        //
    }
}
