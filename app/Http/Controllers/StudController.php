<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use CATIA\Http\Requests;
use CATIA\Http\Requests\StudRequest;
use Hash;
use Cookie;
use CATIA\AppAcc;

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
          $set = $request->cookie('sname');
          $request->session()->put('std', $set);
          return view('Client\student');
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
      $acc = AppAcc::where('username', $request->input('username'))->get();
      foreach ($acc as $key => $value) {
        $checker = Hash::check($request->input('pwd'), $value->password );
        if($checker){
          session()->put('std_login', bcrypt($curdate));
          session()->save();
          AppAcc::where('manpower_id',$value->manpower_id)
                  ->update(['timelogin' => $curdate]);
          return redirect('/cs')
                ->with('std_n', $value->username);
        }else{
          //test
          echo $checker ;
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
