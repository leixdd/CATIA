<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use CATIA\Http\Requests;
use CATIA\Http\Requests\StudRequest;
use Hash;
use Cookie;
use CATIA\AppAcc;
use CATIA\manpower_profile;
use CATIA\other_info;
use CATIA\listCourse;
use CATIA\post;

class StudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         //$this->middleware('auth');

     }



    public function index(Request $request)
    {
      //checking session already inserted
      if($request->session()->has('std_login')){
        // $request->session()->flush();
        // $response = new Response();
        // $response->withCookie(Cookie::forget('sname'));
        $set = explode("-", $request->cookie('sname'));
        $request->session()->put('std', $set[0]);
        $id_set = $set[1];
        $lst = post::where('is_main', 0)->get();
        return view('Client\student', compact('id_set', 'lst'));
          //session()->save();

      }else{
        return view('Client\login');
      }


    }

    public function ann(Request $request){
      //checking session already inserted
      if($request->session()->has('std_login')){
        // $request->session()->flush();
        // $response = new Response();
        // $response->withCookie(Cookie::forget('sname'));
        $set = explode("-", $request->cookie('sname'));
        $request->session()->put('std', $set[0]);
        $id_set = $set[1];
        $ann = post::where('is_main', 1)->get();

        $lst = post::orderBy('is_main', 'desc')->get();
        return view('Client\ann', compact('id_set', 'lst', 'ann'));
          //session()->save();

      }else{
        return view('Client\login');
      }
    }

    public function stg(Request $request){

    }

    public function sts(Request $request){
      return redirect()->route('students.index')->withCookie(cookie()->forever('sname', session('std_n')));
    }

    public function showlogin(){
      return view('Client\login');
    }


    public function login(StudRequest $request){
      $curdate = \Carbon\Carbon::now();
      if(AppAcc::where('username', $request->input('username'))->count() === 0){
        return view('Client\login')->with('message','Something wrong. Please login');
      }else{
        $acc = AppAcc::where('username', $request->input('username'))->get();
        foreach ($acc as $key => $value) {
          $checker = Hash::check($request->input('pwd'), $value->password );
          if($checker){
            session()->put('std_login', bcrypt($curdate));
            session()->save();
            AppAcc::where('manpower_id',$value->manpower_id)
                    ->update(['timelogin' => $curdate]);
            return redirect('/cs')
                  ->with('std_n', $value->username."-".$value->manpower_id);
          }else{
            return view('Client\login');
          }
        }
      }

    }

    public function logout(Request $request){
      $request->session()->flush();
      return redirect()->route('students.index')->withCookie(Cookie::forget('sname'));
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

    /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
      //checking session already inserted
      if($request->session()->has('std_login')){
        // $request->session()->flush();
        // $response = new Response();
        // $response->withCookie(Cookie::forget('sname'));
        $set = explode("-", $request->cookie('sname'));
        $request->session()->put('std', $set[0]);
        $id_set = $set[1];
        $app_pro = manpower_profile::with('personal_infos', 'other_infos')->where("id", $id)->get();
        foreach($app_pro as $ap){
          $course_id = $ap['course_id'];
        }


        $course = listCourse::find($course_id)->course;
        $fee = listCourse::find($course_id)->fee;
        $id_set = $id;
        return view('Client/account', compact('app_pro','course', 'fee', 'id_set'));
          //session()->save();

      }else{
        return view('Client\login');
      }


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
