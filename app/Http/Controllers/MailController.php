<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use CATIA\Http\Requests;
use CATIA\reply_logs;
use CATIA\Commands\Storerep_logs;
use CATIA\settings;
use Config;
class MailController extends Controller
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

    public function __construct(){
      $this->middleware('auth');
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

        // $set = settings::find(1);
        // echo $set->setting_value;
      session()->put('r_e', $request->input('r_email'));

      $data = array('name'=> $request->input('r_name'),
                    'msg' => $request->input('s_msg'));

      // $x = Mail::send(['text'=>'mail'], $data, function($message) {
      //
      // $message->to(session('r_e'), 'Tutorials Point')->subject('Message from catia');
      // $message->from('catia.foundation@gmail.com','CATIA');
      //
      // });

      $headers = 'From: catia.foundation@gmail.com \r\n'.

      'Reply-To: '.$request->input('r_email')."\r\n" .

      'X-Mailer: PHP/' . phpversion();
      
      mail($request->input('r_email'), 'Message from catia', $request->input('s_msg'), $headers);

      $now = \Carbon\Carbon::now();
      $d_msg = new Storerep_logs(0,$request->input('r_id'), $request->input('r_name'), $request->input('s_msg'), $now, $request->input('r_email'));
      $this->dispatch($d_msg);
      return \Redirect::route('adminpanel.index')
              ->with('message', "Your reply was succesfully sent to" . $request->input('r_email'));
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

    }
}
