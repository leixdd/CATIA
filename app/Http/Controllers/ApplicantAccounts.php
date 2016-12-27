<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;
use CATIA\AppAcc;
use CATIA\Http\Requests;
use CATIA\Http\Requests\ReqAppacc;
use CATIA\manpower_profile;
use CATIA\Commands\StoreNewAcc;
use CATIA\Commands\UpdateAppc;


class ApplicantAccounts extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //creating new account for applcants
        //$this->middleware('auth');
        //return view('AppAccount/newAppAcc');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReqAppacc $request)
    {
        $id = $request->input('id_s');
        $username = $request->input('username');
        $password = $request->input('pwd');

        $exeCommand = new StoreNewAcc($id, $username, $password);
        $this->dispatch($exeCommand);

        $this->dispatch(new UpdateAppc($id, 1));

        return \Redirect::route('adminpanel.index')
                ->with('message', 'New Account for an Applicant added');
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
      $app_single = manpower_profile::with('personal_infos', 'other_infos')->find($id);
      return view('AppAccount/newAppAcc', compact('app_single'));
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
