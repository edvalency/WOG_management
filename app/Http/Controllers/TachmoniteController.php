<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TachmoniteController extends Controller
{
     public function index(){
        return view('tachmonite.index',compact('members'));

    }

    public function members()
    {
        $members = DB::table('members')
        ->where('dept','tachmonite')
            ->orderBy('fullname')
            ->get();

        return view('tachmonite.index',compact('members'));
    }

    public function attendance(){

        return view('tachmonite.attendance.index');
    }
}
