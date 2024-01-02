<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class MemberController extends Controller
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
        $data = DB::table('members')
        ->orderBy('fullname')
            ->get();

        return view('member.members', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.addmember');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'mimes:jpg,png,jpeg'
        ]);

        if($request->img){
             $newImgName = date('dmy') . '-' . time() . '.' . $request->img->getClientOriginalextension();

        $request->img->move(public_path('profileImg'), $newImgName);

        Member::create([
            'profileImg' => $newImgName,
            'fullname' => $request->input('fullname'),
            'dob' => $request->input('dob'),
            'membership_no'=> random_int(1000,9999),
            'contact' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'hometown' => $request->input('hometown'),
            'region' => $request->input('region'),
            'marital'=>$request->input('marital'),
            'residence' => $request->input('residence'),
            'email' => $request->input('email'),
            'fathersname' => $request->input('fathersname'),
            'fatherstat' => $request->input('fatherstat'),
            'mothersname' => $request->input('mothersname'),
            'motherstat' => $request->input('motherstat'),
            'next_of_kin' => $request->input('nok'),
            'next_of_kin_contact' => $request->input('nok_phone'),
            'relation_to_nok' => $request->input('r_nok'),
            'email_of_nok' => $request->input('nok_email'),
            'dept' => $request->input('department'),
            'baptism_stat' => $request->input('baptism'),
            'date_baptised' => $request->input('baptism_date'),
            'yom' => $request->input('yom'),
            'profession' => $request->input('profession'),
            'present_occupation' => $request->input('occupation'),
            'name_of_company' => $request->input('company_name'),
            'employment_stat' => $request->input('em_stat'),
        ]);
        }else{
            Member::create([
                'mask' => Str::orderedUuid(),
                'fullname' => $request->input('fullname'),
                'membership_no'=> random_int(1000,9999),
                'dob' => $request->input('dob'),
                'contact' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'hometown' => $request->input('hometown'),
                'region' => $request->input('region'),
                'marital'=>$request->input('marital'),
                'residence' => $request->input('residence'),
                'email' => $request->input('email'),
                'fathersname' => $request->input('fathersname'),
                'fatherstat' => $request->input('fatherstat'),
                'mothersname' => $request->input('mothersname'),
                'motherstat' => $request->input('motherstat'),
                'next_of_kin' => $request->input('nok'),
                'next_of_kin_contact' => $request->input('nok_phone'),
                'relation_to_nok' => $request->input('r_nok'),
                'email_of_nok' => $request->input('nok_email'),
                'dept' => $request->input('department'),
                'baptism_stat' => $request->input('baptism'),
                'date_baptised' => $request->input('baptism_date'),
                'yom' => $request->input('yom'),
                'profession' => $request->input('profession'),
                'present_occupation' => $request->input('occupation'),
                'name_of_company' => $request->input('company_name'),
                'employment_stat' => $request->input('em_stat'),
            ]);
        }
       
        return redirect()->back()->with('success', "Member Registered");
    }

    public function single($request)
    {

        $data = DB::table('members')
            ->where('mask', $request)
            ->first();
        // console.log()

        // dd($data);
        return view('member.details', ['data' => $data]);
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
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        DB::table('members')->where('id','=', $request->input('id'))
        ->update([
            // 'profileImg' => $newImgName,
            'fullname' => $request->input('fullname'),
            'dob' => $request->input('dob'),
            'contact' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'hometown' => $request->input('hometown'),
            'marital'=>$request->input('marital'),
            'region' => $request->input('region'),
            'residence' => $request->input('residence'),
            'email' => $request->input('email'),
            'father_name' => $request->input('fathers_name'),
            'father_stat' => $request->input('dad_stat'),
            'mother_name' => $request->input('mothers_name'),
            'mother_stat' => $request->input('mom_stat'),
            'next_of_kin' => $request->input('nok'),
            'nok_contact' => $request->input('nok_phone'),
            'relation_to_nok' => $request->input('r_nok'),
            'email_of_nok' => $request->input('nok_email'),
            'dept' => $request->input('department'),
            'baptism_stat' => $request->input('baptism'),
            'date_baptised' => $request->input('baptism_date'),
            'yom' => $request->input('yom'),
            'profession' => $request->input('profession'),
            'present_occupation' => $request->input('occupation'),
            'name_of_company' => $request->input('company_name'),
            'employment_stat' => $request->input('em_stat'),
        ]);
        return redirect('/all_members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }

    public function search(Request $request){
       $data = Member::where('fullname', 'like', "%" . $request->input('search') . "%")->get();
        return view('member.members')->with('data', $data);
    }

    public function look_up(Request $request){
        $data = Member::where('fullname', 'like', "%" . $request->input('name') . "%")->get();
         return response()->json($data);
     }
}
