<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;
use CATIA\Http\Requests;
use CATIA\listCourse;
use CATIA\manpower_profile;
use CATIA\other_info;

class CatiaPrinting extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param = array();
        $course_info = listCourse::find(session('course_id'));
        $fullname = manpower_profile::find(session('man_id'))->last_name .",".
                    manpower_profile::find(session('man_id'))->first_name . " ".
                    manpower_profile::find(session('man_id'))->middle_name;

        // $course_info = listCourse::find(1);
        // $fullname = manpower_profile::find(7)->last_name .",".
        //             manpower_profile::find(7)->first_name . " ".
        //             manpower_profile::find(7)->middle_name;

        ini_set("memory_limit", "999M");
        ini_set("max_execution_time", "999");
        $other = session('payment');
        $param['man_name'] = strtoupper($fullname);
        $param['id'] = session('catia_id');
        $param['course_fee'] = $course_info->fee;
        $param['course'] = $course_info->course;
        $param['array_course'] = $course_info;
        $param['paymentz'] = $other;
        $param['remBal'] = session('remBal');
        $param['expire'] = session('exp');
        $f = session('catia_id');
        $file = $f.".pdf";
        if ($f != "") {
             $pdf = \PDF::loadView('PrintPreview', $param);
             return $pdf->download($file);
        } else {
            echo "Please Go back to the Earlier Page";
        }
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
