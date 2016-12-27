<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;

use CATIA\Http\Requests;
use CATIA\msg;
use CATIA\Commands\Storemsg;
use CATIA\Commands\Deletemsg;
use CATIA\Commands\Deletermsg;
use CATIA\Http\Requests\cat;
class msg_cnt extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $this->middleware('auth');
      $list = msg::simplePaginate(5);
      return view('mess', compact('list'));

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
    public function store(cat $request)
    {

        $id = 0;
        $title = $request->input("title");
        $message = $request->input("msgx");
        $em = $request->input("email");
        $date = \Carbon\Carbon::now();

        $cmd = new Storemsg($id, $title, $message, $date, $em);
        $this->dispatch($cmd);

        return \Redirect::route('join.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->middleware('auth');
        $list = msg::find($id);
        //echo $list;
        return $list;
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
        $this->middleware('auth');
        $d_cmd = new Deletemsg($id);
        $this->dispatch($d_cmd);
        $c_cmd = new Deletermsg($id);
        $this->dispatch($c_cmd);

        return \Redirect::route('adminpanel.index')
                ->with('message', 'Message #' . $id . ' was deleted to the list');
    }
}
