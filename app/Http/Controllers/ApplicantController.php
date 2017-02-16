<?php

namespace CATIA\Http\Controllers;

use CATIA\Commands\StoreApplicantCommand;
use CATIA\Commands\StorePersonalCommand;
use CATIA\Commands\StoreOtherCommand;
use CATIA\Commands\UpdateApplicantCommand;
use CATIA\Commands\UpdatePersonalCommand;
use CATIA\Commands\UpdateOtherCommand;
use CATIA\Commands\DeleteApplicantCommand;
use CATIA\Commands\DeletePersonalCommand;
use CATIA\Commands\DeleteOtherCommand;
use CATIA\Commands\FullPaid;
use CATIA\Http\Requests\ApplicantStoreRequest;
use CATIA\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use CATIA\Http\Requests;
use CATIA\manpower_profile;
use CATIA\listCourse;
use CATIA\other_info;
use CATIA\batching;
use CATIA\Commands\batchingTick;
use CATIA\Commands\batchUpdate;
use CATIA\AppAcc;

use Session;
use Carbon;
class ApplicantController extends Controller
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
    }

    public function batch_gen(){

      $rv = batching::get();

      return $rv;
    }

    public function getBatch(Request $request){
      return ApplicantController::batch_search($request->input('batch_sort'),$request->input('path'),$request->input('accessx'));
    }


    public function batch_search($query,$coursecode,$access){
      $today = \Carbon\Carbon::now();
      $condition = 'a';
      $status = $access == 1 ? 'Confirm' : 'Pending';
      $emerghed = $access; //hahaha
      $supereme = $coursecode;
      $course = listCourse::find($coursecode)->course;
      if($query != 0){
        if (manpower_profile::with('personal_infos', 'other_infos')
                  ->where([
                      ['is_active', '=', $access],
                      ['course_id', '=', $coursecode],
                      ['batch', '=', $query]
                    ])->count() === 0) {
            return view('Application_Form/Core/core_core', compact('condition','course','status', 'emerghed', 'supereme', 'today'));
        } else {
            $app_pro = manpower_profile::with('personal_infos', 'other_infos')
                      ->where([
                          ['is_active', '=', $access],
                          ['course_id', '=', $coursecode],
                          ['batch', '=', $query]
                        ])->paginate(15);
            $condition = 'b';
            $fee = listCourse::find($coursecode)->fee;
            return view('Application_Form/Core/core_core', compact('app_pro', 'condition', 'course', 'fee', 'status', 'emerghed', 'supereme', 'today'));
        }
      }else{
        return ApplicantController::AccessingLink(implode("-",array($emerghed,$supereme)));
      }

    }

    public function printing(Request $request){

        print_r($request->input('array'));
        //return view('Printing/print');

    }

    public function search(Request $request){
        return ApplicantController::gen_search($request->input('search_name'),$request->input('path'),$request->input('accessx'));
    }

    public function gen_search($query,$coursecode,$access){
      $today = \Carbon\Carbon::now();
      $condition = 'a';
      $status = $access == 1 ? 'Confirm' : 'Pending';
      $emerghed = $access; //hahaha
      $supereme = $coursecode;
      $course = listCourse::find($coursecode)->course;
      if (manpower_profile::with('personal_infos', 'other_infos')
                ->where([
                    ['is_active', '=', $access],
                    ['course_id', '=', $coursecode],
                    ['last_name', 'like', '%'.$query.'%']
                  ])->orWhere([
                    ['is_active', '=', $access],
                    ['course_id', '=', $coursecode],
                    ['first_name', 'like', '%'.$query.'%']
                  ])->orWhere([
                    ['is_active', '=', $access],
                    ['course_id', '=', $coursecode],
                    ['middle_name', 'like', '%'.$query.'%']
                  ])->count() === 0) {
          return view('Application_Form/Core/core_core', compact('condition','course','status', 'emerghed', 'supereme', 'today'));
      } else {
          $app_pro = manpower_profile::with('personal_infos', 'other_infos')
                    ->where([
                        ['is_active', '=', $access],
                        ['course_id', '=', $coursecode],
                        ['last_name', 'like', '%'.$query.'%']
                      ])->orWhere([
                        ['is_active', '=', $access],
                        ['course_id', '=', $coursecode],
                        ['first_name', 'like', '%'.$query.'%']
                      ])->orWhere([
                        ['is_active', '=', $access],
                        ['course_id', '=', $coursecode],
                        ['middle_name', 'like', '%'.$query.'%']
                      ])->paginate(15);
          $condition = 'b';
          $fee = listCourse::find($coursecode)->fee;
          return view('Application_Form/Core/core_core', compact('app_pro', 'condition', 'course', 'fee', 'status', 'emerghed', 'supereme', 'today'));
      }
    }

    public function batching()
    {
        $advanced = \Carbon\Carbon::now()->addDays(2);
        $last_batch = batching::orderBy('id','desc')->first();
        if($last_batch['population'] === 10){
          $this->dispatch(new batchUpdate($last_batch['id'], \Carbon\Carbon::now(), ($last_batch['population'] + 1 )));
        }elseif ($last_batch['population'] === 15 || $advanced->toDateString() === $last_batch['tenthActivation']) {
          $this->dispatch(new batchingTick(0, ($last_batch['batch'] + 1), 1, 0000-00-00));
        }else{
          $this->dispatch(new batchUpdate($last_batch['id'], $last_batch['tenthActivation'], ($last_batch['population'] + 1 )));
        }

        $refresh = batching::orderBy('id','desc')->first();
        return $refresh['batch'];

    }


    public function AccessingLink($link){
        //$td = \Carbon\Carbon::create(2017,2,25); //serves as a tester if the task # 2 is working :)
        $today = \Carbon\Carbon::now(); //$td->toDateString(); uncomment to match the earlier line
        $data = explode("-", $link);
        $condition = 'a';
        $status = $data[1] == 1 ? 'Confirm' : 'Pending';
        $emerghed = $data[1]; //hahaha
        $supereme = $data[0];
        $course = listCourse::find($data[0])->course;
        if (manpower_profile::with('personal_infos', 'other_infos')->where([
            ['is_active', '=', $data[1]],
            ['course_id', '=', $data[0]]
          ])->count() === 0) {
            return view('Application_Form/Core/core_core', compact('condition','course','status', 'emerghed', 'supereme', 'today'));
        }else{
          $condition = 'b';
          $app_pro = manpower_profile::with('personal_infos', 'other_infos')->where([
                     ['is_active', '=', $data[1]],
                     ['course_id', '=', $data[0]]
                     ])->paginate(15);
          $fee = listCourse::find($data[0])->fee;
          return view('Application_Form/Core/core_core', compact('app_pro', 'condition', 'course', 'fee', 'status', 'emerghed', 'supereme', 'today'));
        }
    }
    /**
     * Show the form for creat  ing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Application_Form/create');
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

        if ($applicant_image) {
            $applicant_image_filename = '/images/' . $applicant_image->getClientOriginalName();
            $applicant_image->move(public_path('images'), $applicant_image_filename);
        } else {
            $applicant_image_filename = '/images/' . $sex . '_img.png';
        }

        //list commands

        $main_command = new StoreApplicantCommand($id, $applicant_image_filename, $entry_date, $last_name, $first_name, $middle_name, $num_street, $barangay, $district, $city, $province, $region, $email, $contact, $nationality);

        $returned = $this->dispatch($main_command);
        $returned_id = $returned->id;

        $personal_command = new StorePersonalCommand($returned_id, $sex, $cv_status, $emp_status, $bdate_month, $bdate_day, $bdate_year, $age, $bplace_city, $bplace_province, $bplace_region, $educ_attain);
        $other_command = new StoreOtherCommand($returned_id, $classification, $terms);

        $this->dispatch($personal_command);
        $this->dispatch($other_command);

        return \Redirect::route('application.index')
                ->with('message', 'New Applicant Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app_single = manpower_profile::with('personal_infos', 'other_infos')->find($id);
        $course_x;

        // foreach ($app_single->other_infos as $x) {
        //     $course_x = listCourse::find($x->course_id)->course;
        // }
        return compact('app_single');
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
        return view('Application_Form/edit', compact('app_single'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_f($manpower_id)
    {
        $arr = manpower_profile::with('other_infos')->find($manpower_id);
        $check_bal =0;
        foreach ($arr as $key =>$value) {
            $check_bal = $value;
        }

        $is_active = 0;
        if ($check_bal == 0) {
            $is_active = 1;
            $main_command = new FullPaid($manpower_id, $is_active);

            $this->dispatch($main_command);
        }

        return \Redirect::route('adminpanel.index')
                ->with('message', 'Applicant #' . $manpower_id . ' is now Active');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
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
        $finalbal = 0;
        $remBal = listCourse::find($course_id)->fee;
        if ($payment == "HALF") {
            $remBal /= 2;
            $finalbal = $remBal;
        }
        $current_applicant_image = manpower_profile::find($id)->image_href;

        if ($applicant_image) {
            $applicant_image_filename = '/images/' . $applicant_image->getClientOriginalName();
            $applicant_image->move(public_path('images'), $applicant_image_filename);
        } else {
            $applicant_image_filename = $current_applicant_image;
        }

        //list commands

        $main_command = new UpdateApplicantCommand($id, $applicant_image_filename, $last_name, $first_name, $middle_name, $num_street, $barangay, $district, $city, $province, $region, $email, $contact, $nationality, $payment, $course_id);

        $this->dispatch($main_command);

        $personal_command = new UpdatePersonalCommand($id, $sex, $cv_status, $emp_status, $bdate_month, $bdate_day, $bdate_year, $age, $bplace_city, $bplace_province, $bplace_region, $educ_attain);
        $other_command = new UpdateOtherCommand($id, $classification, $terms, $finalbal);

        $this->dispatch($personal_command);
        $this->dispatch($other_command);

        return \Redirect::route('adminpanel.index')
                ->with('message', 'Applicant #' . $id . ' Edited');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_full($id)
    {
        $app_single = manpower_profile::with('personal_infos', 'other_infos')->find($id);
        $check_bal = 0;

        foreach ($app_single->other_infos as $key) {
            $check_bal =  $key->remBal;
        }

        $is_active = 0;
        if ($check_bal == 0) {
            $is_active = 1;
            $main_command = new FullPaid($id, $is_active, ApplicantController::batching());

            $this->dispatch($main_command);
            return \Redirect::route('adminpanel.index')
                    ->with('message', 'Applicant #' .$id . ' is now Active');
        }


        return \Redirect::route('adminpanel.index')
                ->with('message', 'Error Something is wrong');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_command = new DeleteApplicantCommand($id);
        $delete_personalcommand = new DeletePersonalCommand($id);
        $delete_othercommand = new DeleteOtherCommand($id);

        $this->dispatch($delete_command);
        $this->dispatch($delete_personalcommand);
        $this->dispatch($delete_othercommand);
        AppAcc::where('manpower_id', $id)->delete();

        return \Redirect::route('adminpanel.index')
                ->with('message', 'Applicant #' . $id . ' already deleted to the list');
    }
}
