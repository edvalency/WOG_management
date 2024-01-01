<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Gc_expense;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
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
        $current = 0;
        $date = date('m');
        $data = Expense::all()->sortByDesc('created_at');
        foreach ($data as $mnth) {
            $split = explode('-', $mnth->created_at);
            if ($split[1] == $date) {
                $current += $mnth->amount;
            }
        }

        $thismonth = array();
        $currentMonth = Expense::all()->sortByDesc('created_at');
        foreach ($currentMonth as $month) {
            $split = explode('-', $month->created_at);
            if ($split[1] == $date) {
                array_push($thismonth,$month);
            }
        }
        // dd($thismonth);

        return view('expenses')->with(['expense' => $thismonth, 'total' => $current]);
    }

    public function prev(){
        $current = 0;
        $date = date('m');
        $thismonth = array();
        $currentMonth = Expense::all()->sortByDesc('created_at');
        foreach ($currentMonth as $month) {
            $split = explode('-', $month->created_at);
            if ($split[1] == $date-1) {
                array_push($thismonth,$month);
                $current += $month->amount;
            }
        }
        return view('expenses')->with(['expense'=>$thismonth, 'total'=>$current]); 
    }

    public function all(){
        $data = Expense::all()->sortByDesc('created_at');
        $sum = DB::table('expenses')->sum('expenses.amount');

        // dd($sum);
        return view('expenses')->with(['expense'=>$data, 'total'=>$sum]);

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
        $month = date('F');
        Expense::create([
            'amount' => $request->input('amount'),
            'description' => $request->input('desc'),
            'month' => $month
        ]);
        return redirect()->back();
    }

    public function gcexpenses(){
        $data = Gc_expense::all()->sortByDesc('created_at');
        $totalexpense = DB::table('gc_expenses')->sum('gc_expenses.amount');


        return view('gc.expenses',['total'=>$totalexpense, 'expense'=>$data]);
    }

    public function gcexpensestore(Request $request){
        Gc_expense::create([
            'description' => $request->input('desc'),
            'amount' => $request->input('amount')
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
