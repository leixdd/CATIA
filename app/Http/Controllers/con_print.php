<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;

use CATIA\Http\Requests;
use CATIA\manpower_profile;

class con_print extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
      $param['entry_date'] = $showing->entry_date;
      $param['img'] = $showing->image_href;
      $param['last'] = $showing->last_name;
      $param['first'] = $showing->first_name;
      $param['middle'] = $showing->middle_name;
      $param['num_street'] = $showing->num_street;
      $param['barangay'] = $showing->barangay;
      $param['district'] = $showing->district;
      $param['city'] = $showing->city;
      $param['province'] = $showing->province;
      $param['region'] = $showing->region;
      $param['email'] = $showing->email;
      $param['contact'] = $showing->contact;
      $param['nationality'] = $showing->nationality;
      foreach ($showing->personal_infos as $key) {
        $param['sex'] = $key->sex;
        $param['cv'] = $key->cv_status;
        $param['emp'] = $key->emp_status;
        $param['bdm'] = $key->bdate_month;
        $param['bdd'] = $key->bdate_day;
        $param['bdy'] = $key->bdate_year;
        $param['bp'] = $key->bplace_city . " " . $key->bplace_province . " " . $key->bplace_region;
        $param['educ'] = $key->educ_attain;
      }
      foreach ($showing->other_infos as $key) {
        $param['class'] = $key->classification;
        $param['course'] = ($key->course_id == 1)? 'Database Mgmt. and App. Prog.' : 'Computer Systems Servicing NCII';
        $param['serial'] = $key->serial;
      }
      $pdf = \PDF::loadView('Printing/PrintConfirm', $param);
      return $pdf->download($param['serial'].'.pdf');
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
