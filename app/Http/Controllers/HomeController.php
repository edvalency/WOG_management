<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Faker\Extension\Extension;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function main()
    {
        $members = DB::table('members')
            ->count();
        $revenue =['total' => DB::table('accounts')->where('type','church')->pluck('amount')->first(),'curr_month'=>DB::table('revenue')->whereMonth('created_at',Carbon::now()->month)->sum('amount')] ;
        $expenses = ['total' => DB::table('expenses')->sum('amount'),'curr_month'=>DB::table('expenses')->whereMonth('created_at',Carbon::now()->month)->sum('amount')] ;
        $welfares = ['total' => DB::table('accounts')->where('type','welfare')->pluck('amount')->first(),'curr_month'=>DB::table('welfares')->whereMonth('created_at',Carbon::now()->month)->sum('amount')] ;
        $welfare_expenses = ['total' => DB::table('welfare_expenses')->sum('amount'),'curr_month'=>DB::table('welfare_expenses')->whereMonth('created_at',Carbon::now()->month)->sum('amount')] ;


        // $date = date('Y');
        // $data = DB::table('offertories')->get();

        // $months = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        // foreach ($data as $offer) {
        //     $splt = explode("-", $offer->created_at);
        //     if ($splt[0] == $date) {
        //         if ($splt[1] == "01") {
        //             $months[0] += $offer->amount;
        //         } elseif ($splt[1] == "02") {
        //             $months[1] += $offer->amount;
        //         } elseif ($splt[1] == "03") {
        //             $months[2] += $offer->amount;
        //         } elseif ($splt[1] == "04") {
        //             $months[3] += $offer->amount;
        //         } elseif ($splt[1] == "05") {
        //             $months[4] += $offer->amount;
        //         } elseif ($splt[1] == "06") {
        //             $months[5] += $offer->amount;
        //         } elseif ($splt[1] == "07") {
        //             $months[6] += $offer->amount;
        //         } elseif ($splt[1] == "08") {
        //             $months[7] += $offer->amount;
        //         } elseif ($splt[1] == "09") {
        //             $months[8] += $offer->amount;
        //         } elseif ($splt[1] == "10") {
        //             $months[9] += $offer->amount;
        //         } elseif ($splt[1] == "11") {
        //             $months[10] += $offer->amount;
        //         } elseif ($splt[1] == "12") {
        //             $months[11] += $offer->amount;
        //         }
        //     }
        // }
        return view('dashboard', compact('members','revenue','expenses','welfares','welfare_expenses'));
    }

    public function userAdd()
    {
        return view('users.add');
    }

    public function userSave(Request $request)
    {
        Validator::make($request->all(),['phone'=>'required|unique:users','email'=>'required|unique:users','name'=>'required']);

        $password = Str::random(6);
        DB::table('users')->insert([
            'name' => $request->name,
            'mask' => Str::orderedUuid(),
            'email' => $request->email,
            'phone' => $request->phone,
            'roles' => json_encode($request->position),
            'password' => Hash::make($password)
        ]);

        $message = 'Hello ' . $request->name . ', Your account has been created on ' . env("APP_NAME") . '. Access the platform via ' . env('APP_URL') . ' with the email: '
            . $request->email . ' and password: ' . $password . '.';

        sendText($request->phone,$message);

        return redirect(route('users'))->with('success', "User added successfully");
    }

    public function users()
    {
        $users = DB::table('users')->get();

        return view('users.index', compact('users'));
    }

    public function userEdit($user)
    {
        $userdetails = DB::table('users')->where('mask', $user)->first();

        return view('users.edit', compact('userdetails'));
    }

    public function userUpdate(Request $request, $user)
    {
        // dd($request);

        DB::table('users')->where('mask', $user)->update([
            'name' => $request->name,
            'username' => $request->username,
            'position' => $request->position
        ]);

        return redirect(route('users'))->with('success', "User details updated");
    }

    public function userDelete($user)
    {
        DB::table('users')->where('mask', $user)->delete();
        return redirect()->back()->with('success', "User deleted");
    }

    public function mongodb(Request $request)
    {
        $connection = DB::connection('mongodb');
        $msg = "Mongo is here!";

        try {
            $connection->command(['ping' => 1]);
        } catch (Exception $e) {
            $msg = "Mongo is inaccessible";
        }

        return ['msg' => $msg];
        // $connect = null;
        //  $connect = DB::connection('mongodb');
        //     $msg = 'MongoDB is accessible!';
        //     try {
        //         $connect->command(['ping' => 1]);
        //     } catch (\Exception  $e) {
        //         $msg = 'MongoDB is not accessible. Error: ' . $e->getMessage();
        //     }
        //     return ['msg' => $msg];
    }

    public function destroy()
    {
        Auth::logout();
        Session::flush();

        return redirect('/');
    }
}
