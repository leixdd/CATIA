<?php

namespace CATIA\Http\Controllers;

use CATIA\Commands\uptrans;
use CATIA\Commands\FullPaid;
use CATIA\Http\Requests\TransReq;
use Illuminate\Http\Request;
use CATIA\Http\Requests;
use CATIA\manpower_profile;
use CATIA\listCourse;
use CATIA\other_info;

class Transac extends Controller
{

    public function __construct()
    {
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
        $app_single = manpower_profile::with('personal_infos', 'other_infos')->find($id);
        $course_x;
        $fee;
        $rem;
        $tot;
        foreach ($app_single->other_infos as $x) {
            $course_x = listCourse::find($x->course_id)->course;
            $fee = listCourse::find($x->course_id)->fee;
            $rem = $x->remBal;
            $tot = $x->App_Payment;
        }
        return view('Application_Form/transac', compact('app_single', 'course_x', 'fee', 'rem', 'tot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransReq $request, $id)
    {
        $App_Payment = $request->input('app_pay');
        $app_single = manpower_profile::with('personal_infos', 'other_infos')->find($id);
        $rem;
        $lastp;
        foreach ($app_single->other_infos as $x) {
            $rem = $x->remBal;
            $lastp = $x->App_Payment;
        }
        $fr = $rem - $App_Payment;
        $fb = $lastp + $App_Payment;

        $updatetrans = new uptrans($id, $fr, $fb);
        $this->dispatch($updatetrans);

        return \Redirect::route('trans.edit', $id)->with('message', $App_Payment. ' Pesos is removed to remaining balance');
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
