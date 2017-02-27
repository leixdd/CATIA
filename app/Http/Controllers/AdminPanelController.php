<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;
use CATIA\Http\Requests;
use CATIA\msg;
use CATIA\manpower_profile;
use CATIA\User;
use CATIA\Visitors;

class AdminPanelController extends Controller
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
        $list = msg::simplePaginate(20);
        $count_app = manpower_profile::count();
        $count_msg = msg::count();
        $count_use = User::count();
        $visit_count = Visitors::count();
        $visitors = Visitors::orderBy('id','desc')->Paginate(7);
        return view('Admin_Panel\index', compact('list','visitors'))
                    ->with('app_count', $count_app)
                    ->with('msg_count', $count_msg)
                    ->with('use_count', $count_use)
                    ->with('visit_count', $visit_count);
    }
    public function x()
    {
        return view('auth/register');
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
