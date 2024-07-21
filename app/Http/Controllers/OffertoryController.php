<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Offertory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffertoryController extends Controller
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
        $data = DB::table('offertories')
            ->get();

        $sum = DB::table('offertories')
            ->sum('offertories.amount');
        return view('offertory', ['data' => $data, 'totalOffering' => $sum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('offertories')->updateOrInsert([
            'created_at' => Carbon::now()->toDateString()
        ], [
            'amount' => $request->input('amount')
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offertory  $offertory
     * @return \Illuminate\Http\Response
     */
    public function show(Offertory $offertory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offertory  $offertory
     * @return \Illuminate\Http\Response
     */
    public function edit(Offertory $offertory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offertory  $offertory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offertory $offertory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offertory  $offertory
     * @return \Illuminate\Http\Response
     */
    public function destroy($offertory)
    {
        DB::table('offertories')->where('id', $offertory)->delete();

        return redirect()->back()->with('success', 'Record deleted');
    }
}
