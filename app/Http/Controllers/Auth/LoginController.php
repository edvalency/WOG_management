<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        Validator::make($request->all(), ['email' => "required", 'password' => 'required']);

        // $pass = DB::table('users')->where('email',$request->email)->first();
        //  if(Hash::check($request->password, $pass['password'])){
        //     return redirect(route('home'));
        // }else{
        //     return back()->with('error',"Email or Password incorrect");
        // }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            recordActivity('Logged in');
            return redirect(route('home'));
        } else {
            return back()->with('error', "Email or Password incorrect");
        }
    }
}
