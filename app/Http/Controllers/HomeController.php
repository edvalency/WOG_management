<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserPermission;
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
        $revenue = ['total' => DB::table('accounts')->where('type', 'church')->pluck('amount')->first(), 'curr_month' => DB::table('revenue')->whereMonth('created_at', Carbon::now()->month)->sum('amount')];
        $expenses = ['total' => DB::table('expenses')->sum('amount'), 'curr_month' => DB::table('expenses')->whereMonth('created_at', Carbon::now()->month)->sum('amount')];
        $welfares = ['total' => DB::table('accounts')->where('type', 'welfare')->pluck('amount')->first(), 'curr_month' => DB::table('welfares')->whereMonth('created_at', Carbon::now()->month)->sum('amount')];
        $welfare_expenses = ['total' => DB::table('welfare_expenses')->sum('amount'), 'curr_month' => DB::table('welfare_expenses')->whereMonth('created_at', Carbon::now()->month)->sum('amount')];

        return view('dashboard', compact('members', 'revenue', 'expenses', 'welfares', 'welfare_expenses'));
    }

    public function userAdd()
    {
        return view('users.add');
    }

    public function userSave(Request $request)
    {
        Validator::make($request->all(), ['phone' => 'required|unique:users', 'email' => 'required|unique:users', 'name' => 'required']);

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

        sendText($request->phone, $message);

        return redirect(route('users'))->with('success', "User added successfully");
    }

    public function users()
    {
        $users = DB::table('users')->get();

        return view('users.index', compact('users'));
    }

    public function userEdit($user)
    {
        $userdetails = User::where('mask', $user)->first();
        $roles = Role::all();

        $all_roles = [];

        foreach ($roles as  $role) {
            $rnp = ['name' => $role->name, 'permissions' => $role->permissions];
            array_push($all_roles, $rnp);
        }

        $user_permissions = $userdetails->permissions;

        return view('users.edit', compact('all_roles', 'userdetails', 'user_permissions'));
    }

    public function userUpdate(Request $request, $user)
    {
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

    public function updateRoles(Request $request, $user)
    {
        DB::table('user_permissions')->where('user_id', $request->user_id)->delete();
        foreach ($request->permissions as $permission) {
            DB::table('user_permissions')->insert([
                'user_id' => $request->user_id,
                'permission' => $permission
            ]);
        }
        return back()->with('success', 'Roles updated');
    }

    public function getTodaysBirthday()
    {
        $members = DB::table('members')->whereDay('dob', date('d'))->whereMonth('dob', date('m'))->get(['fullname', 'contact']);

        foreach ($members as $member) {

            $message = "We pray that as you mark your new age may the Joy of the Lord never depart from your life. May the Lord show you mercy. May his Mercies speak for you everywhere you go and in any situation you find yourself in. May the Lord remember your acts of kindness, your sacrifices and may He answer all your secret prayers and give you rest on every side. We love and celebrate you. Glorious HAPPY BIRTHDAY, $member->fullname! \n\n From: Word Of Grace Worship Center Int.";
            sendText($member->contact, $message);
        }
        return true;
    }

    public function getWeekBirthdays()
    {
        $from = Carbon::parse('sunday');
        $to = Carbon::parse('this saturday');

        // Get all members
        $members = DB::table('members')->get(['fullname', 'contact', 'dob']);
        $birthdayMembers = [];
        foreach ($members as $member) {
            $dob = Carbon::parse($member->dob);
            // Create birthday for current year
            $birthdayThisYear = $dob->copy()->year($from->year);

            // Check if birthday falls within the range
            if (($birthdayThisYear->between($from, $to))) {
                $birthdayMembers[] = $member;
            }
        }

        return $birthdayMembers;
    }

    public function destroy()
    {
        Auth::logout();
        Session::flush();

        return redirect('/');
    }
}
