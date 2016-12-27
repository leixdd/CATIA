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

    public function search(Request $request){
        return ApplicantController::gen_search($request->input('search_name'),$request->input('path'),$request->input('accessx'));
    }
    public function printing(Request $request){

        print_r($request->input('array'));
        //return view('Printing/print');

    }
    public function gen_search($query,$path_to_access,$access){
      $condition = 'a';
      if (manpower_profile::with('personal_infos', 'other_infos')
                ->where([
                    ['is_active', '=', $access],
                    ['last_name', 'like', '%'.$query.'%']
                  ])->orWhere([
                    ['is_active', '=', $access],
                    ['first_name', 'like', '%'.$query.'%']
                  ])->orWhere([
                    ['is_active', '=', $access],
                    ['middle_name', 'like', '%'.$query.'%']
                  ])->count() === 0) {
          return view('Application_Form/'. $path_to_access, compact('condition'));
      } else {
          $app_pro = manpower_profile::with('personal_infos', 'other_infos')
                    ->where([
                        ['is_active', '=', $access],
                        ['last_name', 'like', '%'.$query.'%']
                      ])->orWhere([
                        ['is_active', '=', $access],
                        ['first_name', 'like', '%'.$query.'%']
                      ])->orWhere([
                        ['is_active', '=', $access],
                        ['middle_name', 'like', '%'.$query.'%']
                      ])->paginate(15);
          $condition = 'b';
          $param = [];
          foreach ($app_pro as $x) {
              foreach ($x->other_infos as $key) {
                  $param[''.$key->course_id.''] = listCourse::find($key->course_id)->fee;
              }
          }
          $course_x = [];
          foreach ($app_pro as $x) {
              foreach ($x->other_infos as $key) {
                  $course_x[''.$key->course_id.''] = listCourse::find($key->course_id)->course;
              }
          }
          return view('Application_Form/'.$path_to_access, compact('app_pro', 'condition', 'param', 'course_x'));
      }
    }


    public function view_pending_DB()
    {
        $condition = 'a';
        if (manpower_profile::with('personal_infos', 'other_infos')->where('is_active', 0)->count() === 0) {
            return view('Application_Form/Pending/DB_pending', compact('condition'));
        } else {
            $app_pro = manpower_profile::with('personal_infos', 'other_infos')->where('is_active', 0)->paginate(15);
            $condition = 'b';
            $param = [];
            foreach ($app_pro as $x) {
                foreach ($x->other_infos as $key) {
                    $param[''.$key->course_id.''] = listCourse::find($key->course_id)->fee;
                }
            }
            $course_x = [];
            foreach ($app_pro as $x) {
                foreach ($x->other_infos as $key) {
                    $course_x[''.$key->course_id.''] = listCourse::find($key->course_id)->course;
                }
            }
            return view('Application_Form/Pending/DB_pending', compact('app_pro', 'condition', 'param', 'course_x'));
        }
    }

    public function view_pending_CS()
    {
        $condition = 'a';
        if (manpower_profile::with('personal_infos', 'other_infos')->where('is_active', 0)->count() === 0) {
            return view('Application_Form/Pending/CS_pending', compact('condition'));
        } else {

            $app_pro = manpower_profile::with('personal_infos', 'other_infos')
                      ->where('is_active', 0)->paginate(15);
            $condition = 'b';
            $param = [];
            foreach ($app_pro as $x) {
                foreach ($x->other_infos as $key) {
                    $param[''.$key->course_id.''] = listCourse::find($key->course_id)->fee;
                }
            }
            $course_x = [];
            foreach ($app_pro as $x) {
                foreach ($x->other_infos as $key) {
                    $course_x[''.$key->course_id.''] = listCourse::find($key->course_id)->course;
                }
            }
            return view('Application_Form/Pending/CS_pending', compact('app_pro', 'condition', 'param', 'course_x'));
        }
    }

    public function view_confirm_DB()
    {
        $condition = 'a';
        if (manpower_profile::with('personal_infos', 'other_infos')->where('is_active', 1)->count() === 0) {
            return view('Application_Form/Confirm/view_confirm_DB', compact('condition'));
        } else {
            $app_pro = manpower_profile::with('personal_infos', 'other_infos')->where('is_active', 1)->paginate(15);
            $condition = 'b';
            $param = [];
            foreach ($app_pro as $x) {
                foreach ($x->other_infos as $key) {
                    $param[''.$key->course_id.''] = listCourse::find($key->course_id)->fee;
                }
            }
            $course_x = [];
            foreach ($app_pro as $x) {
                foreach ($x->other_infos as $key) {
                    $course_x[''.$key->course_id.''] = listCourse::find($key->course_id)->course;
                }
            }
            return view('Application_Form/Confirm/view_confirm_DB', compact('app_pro', 'condition', 'param', 'course_x'));
        }
    }

    public function view_confirm_CS()
    {
        $condition = 'a';
        if (manpower_profile::with('personal_infos', 'other_infos')->where('is_active', 1)->count() === 0) {
            return view('Application_Form/Confirm/view_confirm_CS', compact('condition'));
        } else {
            $app_pro = manpower_profile::with('personal_infos', 'other_infos')->where('is_active', 1)->paginate(15);
            $condition = 'b';
            $param = [];
            foreach ($app_pro as $x) {
                foreach ($x->other_infos as $key) {
                    $param[''.$key->course_id.''] = listCourse::find($key->course_id)->fee;
                }
            }
            $course_x = [];
            foreach ($app_pro as $x) {
                foreach ($x->other_infos as $key) {
                    $course_x[''.$key->course_id.''] = listCourse::find($key->course_id)->course;
                }
            }
            return view('Application_Form/Confirm/view_confirm_CS', compact('app_pro', 'condition', 'param', 'course_x'));
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

        $main_command = new UpdateApplicantCommand($id, $applicant_image_filename, $last_name, $first_name, $middle_name, $num_street, $barangay, $district, $city, $province, $region, $email, $contact, $nationality, $payment);

        $this->dispatch($main_command);

        $personal_command = new UpdatePersonalCommand($id, $sex, $cv_status, $emp_status, $bdate_month, $bdate_day, $bdate_year, $age, $bplace_city, $bplace_province, $bplace_region, $educ_attain);
        $other_command = new UpdateOtherCommand($id, $classification, $terms, $course_id, $finalbal);

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
            $main_command = new FullPaid($id, $is_active);

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

        return \Redirect::route('adminpanel.index')
                ->with('message', 'Applicant #' . $id . ' already deleted to the list');
    }
}
