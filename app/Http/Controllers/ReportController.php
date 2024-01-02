<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
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
        return view('report',['type'=> 'Offertory']);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        // dd($request->all());
        // dd(is_null($request->input('month_to')));
        if (is_null($request->input('month_to'))) {
            $data = DB::table($request->input('search'))
                ->whereMonth('created_at', '>=', $request->input('month_from'))
                ->whereYear('created_at', '>=', $request->input('year_from'))
                ->get();

            dd($data);
        } else {
            $data = DB::table($request->input('search'))
                ->whereMonth('created_at', '>=', $request->input('month_from'))
                ->whereYear('created_at', '>=', $request->input('year_from'))
                ->whereMonth('created_at','<=', $request->input('month_to'))
                ->whereYear('created_at','<=',$request->input('year_to'))
                ->get();

            dd($data);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
