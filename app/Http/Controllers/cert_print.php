<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;

use CATIA\Http\Requests;
use CATIA\manpower_profile;
use CATIA\listCourse;
class cert_print extends Controller
{
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
      $param = array();
      $showing = manpower_profile::with('personal_infos', 'other_infos')->find($id);
      $param['last'] = $showing->last_name;
      $param['first'] = $showing->first_name;
      $param['middle'] = $showing->middle_name;
      foreach ($showing->other_infos as $key) {
        $param['course'] = ($key->course_id == 1)? 'Database Mgmt. and App. Prog.' : 'Computer Systems Servicing NCII';
        $param['serial'] = $key->serial;
        $param['hours'] = listCourse::find($key->course_id)->req_hours. ' Hours';
      }
      $pdf = \PDF::loadView('Printing/Certificate', $param);
      return $pdf->stream($param['serial'].'.pdf');
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
        return view('Printing/dateCert', compact('app_single'));
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
        $date = \Carbon\Carbon::create($request->input('year'), $request->input('month'), $request->input('day'));
        $param = array();
        $showing = manpower_profile::with('personal_infos', 'other_infos')->find($id);
        $param['last'] = $showing->last_name;
        $param['first'] = $showing->first_name;
        $param['middle'] = $showing->middle_name;
        foreach ($showing->other_infos as $key) {
            $param['course'] = ($key->course_id == 1)? 'Database Mgmt. and App. Prog.' : 'Computer Systems Servicing NCII';
            $param['serial'] = $key->serial;
            $param['hours'] = listCourse::find($key->course_id)->req_hours. ' Hours';
        }
       $param['date'] = $date->format('jS \\of F Y'); 
       //$this->dispatch(new UpdateAppCer($id, 1));

      $pdf = \PDF::loadView('Printing/Certificate', $param);
      return $pdf->stream($param['serial'].'.pdf');
       
    
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
