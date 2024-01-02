<?php

namespace App\Http\Controllers;

// use App\Models\Contribution;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Models\Gc_contribution;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Gc_contribution_projects;

class ContributionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wohindex()
    {
        //
        return view('woh.contributions');
    }

    public function gcindex()
    {
        $gccontrib = Gc_contribution_projects::all();

        return view('gc.contributions', ['data' => $gccontrib]);
        //
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
    public function store(Request $request)
    {
        //
    }

    public function gccontribproject(Request $request)
    {
        Gc_contribution_projects::create([
            'description' => $request->input('purpose'),

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function gcsingleproject($id)
    {
        $proj = Crypt::decrypt($id);
        $data = DB::table('gc_contributions')
            ->where('description', $proj)
            ->get();

        $amount = DB::table('gc_contributions')
        ->where('description', $proj)
            ->sum('amount');

        // dd($data);
        return view('gc.single_project', ['data' => $data, 'total' => $amount, 'project' => $proj]);
    }

    public function gc_contribution(Request $request)
    {
        DB::table('gc_contributions')->insert([
            'fullname' => $request->input('fullname'),
            'description' => $request->input('project'),
            'amount' => $request->input('amount'),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    // public function edit(Contribution $contribution)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Contribution $contribution)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Contribution $contribution)
    // {
    //     //
    // }
}
