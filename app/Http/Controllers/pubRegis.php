<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;
use CATIA\Http\Requests;
use CATIA\Commands\StoreApplicantCommand;
use CATIA\Commands\StorePersonalCommand;
use CATIA\Commands\StoreOtherCommand;
use CATIA\Http\Requests\ApplicantStoreRequest;
use CATIA\listCourse;


class pubRegis extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //vewing the rules
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public_reg/join');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantStoreRequest $request)
    {
        $id = 0;
        $entry_date = \Carbon\Carbon::now();
        $expire_date = $entry_date->addDays(7)->toFormattedDateString();
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $middle_name = $request->input('middle_name');
        $num_street = $request->input('num_street');
        $barangay = $request->input('barangay');
        $district = $request->input('district');
        $city = $request->input('city');
        $province = $request->input('province');
        $region = $request->input('region');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $nationality = $request->input('nationality');
        $sex = $request->input('sex');
        $cv_status = $request->input('cv_status');
        $emp_status = $request->input('emp_status');
        $bplace_city = $request->input('bplace_city');
        $bplace_province = $request->input('bplace_province');
        $bplace_region = $request->input('bplace_region');
        $bdate_month = $request->input('bdate_month');
        $bdate_day = $request->input('bdate_day');
        $bdate_year = $request->input('bdate_year');
        $age = $request->input('age');
        $classification = $request->input('classification');
        $educ_attain = $request->input('educ_attain');
        $applicant_image = $request->file('applicant_image');
        $terms = 1;
        $course_id = $request->input('course');
        $payment = $request->input('payment');


        if ($applicant_image) {
            $applicant_image_filename = '/images/' . $applicant_image->getClientOriginalName();
            $applicant_image->move(public_path('images'), $applicant_image_filename);
        } else {
            $applicant_image_filename = '/images/' . $sex . '_img.png';
        }

        //list commands

        $main_command = new StoreApplicantCommand($id, $applicant_image_filename, $entry_date, $last_name, $first_name, $middle_name, $num_street, $barangay, $district, $city, $province, $region, $email, $contact, $nationality, $payment , $course_id, 0);

        $returned = $this->dispatch($main_command);
        $returned_id = $returned->id;

        $serial = "CATIA20160000" . $returned_id  . "FI";
        $remBal = listCourse::find($course_id)->fee;
        $finalbal = 0;
        if ($payment == "HALF") {
            $finalbal = $remBal;
            $remBal /= 2;

        }else{
           $finalbal = $remBal;
        }

        $App_Payment = 0;




        $personal_command = new StorePersonalCommand($returned_id, $sex, $cv_status, $emp_status, $bdate_month, $bdate_day, $bdate_year, $age, $bplace_city, $bplace_province, $bplace_region, $educ_attain);
        $other_command = new StoreOtherCommand($returned_id, $classification, $terms,  $serial, $finalbal, $App_Payment, $entry_date->addDays(7));

        $this->dispatch($personal_command);
        $this->dispatch($other_command);



        return \Redirect::route('pdf.index')
                ->with('catia_id', $serial)
                ->with('course_id', $course_id)
                ->with('man_id', $returned_id)
                ->with('payment', $payment)
                ->with('remBal', $remBal)
                ->with('exp', $expire_date);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
