<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class VisitorsController extends Controller
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
        $members = DB::table('members')
            ->orderBy('fullname')
            ->get();

        return view('visitors.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitor.addmember');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function quick_store(Request $request)
    {
        // Validator::make($request->all(), ['phone' => "required|unique:visitors,contact"])->validate();
        function add_visitor($visitor)
        {
            $mask = Str::orderedUuid();
            DB::table('visitors')->insert([
                'fullname' => $visitor->fullname,
                'contact' => $visitor->phone,
                'gender' => $visitor->gender,
                'mask' => $mask,
                'created_at' => Carbon::now()->toDateTimeString()
            ]);

            DB::table('attendance_logs')->insert([
                'attendee_type' => "visitors",
                'attendee_id' => $mask,
                'created_at' =>  Carbon::now()->toDateTimeString()
            ]);
        }

        if ($request->has('males')) {
            for ($i = 1; $i <= $request->males; $i++) {
                add_visitor((object)['fullname' => null, 'phone' => null, 'gender' => 'Male']);
            }
        }

        if ($request->has('females')) {
            for ($i = 1; $i <= $request->females; $i++) {
                add_visitor((object)['fullname' => null, 'phone' => null, 'gender' => 'Female']);
            }
        }



        return redirect()->back()->with('success', "Visitor Registered");
    }

    public function single($mask)
    {

        $visitor = DB::table('members')
            ->where('mask', $mask)
            ->first();
        // dd($member);
        return view('visitor.details', compact('visitor'));
    }

    public function wohsingle($request)
    {

        $data = DB::table('members')
            ->where('mask', $request)
            ->first();
        // console.log()

        // dd($data);
        return view('woh.singledetails', ['data' => $data]);
    }

    public function gcsingle($request)
    {
        $data = DB::table('members')
            ->where('mask', $request)
            ->first();

        return view('gc.singledetails', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return redirect()->back();
    }

    public function gcMembers()
    {
        $data = DB::table('members')
            ->where('dept', 'Game Changers Generation')
            ->get();
        return view('gc.gc_members', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mask)
    {
        // dd($request->all());
        if (is_file($request->image)) {
            $visitor = DB::table('members')->where('mask', $mask)->first(['profileImg', 'fullname']);
            if (file_exists("assets/profile/" . $visitor->profileImg)) {
                unlink("assets/profile/" . $visitor->profileImg);
            }
            $newImgName = $visitor->fullname . '.' . $request->image->extension();
            $request->image->move('assets/profile/', $newImgName);
            $request['profileImg'] = $newImgName;
        }

        DB::table('members')->where('mask', $mask)
            ->update($request->except(['_token', 'image']));

        return back()->with('success', 'Details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $visitor
     * @return \Illuminate\Http\Response
     */
    public function delete($visitor)
    {
        Visitor::where('mask', $visitor)->delete();
        return back()->with('success', "Visitor deleted");
    }

    public function search(Request $request)
    {
        $data = Visitor::where('fullname', 'like', "%" . $request->input('search') . "%")->get();
        return view('visitor.index')->with('data', $data);
    }

    public function look_up(Request $request)
    {
        $data = Visitor::where('fullname', 'like', "%" . $request->input('name') . "%")->get();
        return response()->json($data);
    }
}
