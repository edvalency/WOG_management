<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Gc_offering;
use Illuminate\Http\Request;
use App\Models\GameChangerDue;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class GameChangerDueController extends Controller
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
        $gcmem = Member::where('dept', 'Game Changers Generation')->get();
        // dd($gcmem);
        return view('gc.gc_dues',['member'=>$gcmem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        GameChangerDue::create([
           'member_id' => $request->id,
           'amount' => $request->amount
        ]);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameChangerDue  $gameChangerDue
     * @return \Illuminate\Http\Response
     */
    public function show($gtt)
    {
        $member = Member::where('mask', $gtt)->first();

        $data = DB::table('game_changer_dues')
            ->where('member_id', $gtt)
            ->get();
        // dd($data);
        return view('gc.duesdetails', ['results' => $data, 'member' => $member]);
    }

    public function search(Request $request)
    {
        // $name = Crypt::decrypt($);
        // $data = DB::table('members')
        //     ->where('fullname', '=', $request->input('search'))
        //     ->get();
        $data = Member::where('dept', 'Game Changers Generation')
        ->where('fullname', 'like', "%" . $request->input('search') . "%")
        ->select('fullname')
        ->get();
        return view('gc.gc_members')->with('member',$data);
    }

    public function offerings(){
        $data = Gc_offering::all()->sortByDesc('created_at');

        return view('gc.offering')->with('data',$data);
    }

    public function offeringsstore(Request $request){
        Gc_offering::create([
            'amount' =>$request->input('amount')
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameChangerDue  $gameChangerDue
     * @return \Illuminate\Http\Response
     */
    public function edit(GameChangerDue $gameChangerDue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameChangerDue  $gameChangerDue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameChangerDue $gameChangerDue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameChangerDue  $gameChangerDue
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameChangerDue $gameChangerDue)
    {
        //
    }
}
