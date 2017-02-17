<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;

use CATIA\Http\Requests;
use CATIA\Course;
use CATIA\Commands\CourseUpdate;
use CATIA\Commands\CourseCreate;
use CATIA\Commands\CourseDelete;

class CMS_Course extends Controller
{

    public function __construct()
    {

    }

    public function getCourses(){
      $this->middleware('auth');
      $b = Course::get();
      return view('Admin_Panel/course_app', compact('b'));
    }

    public function pub_getCourses(){
      $b = Course::get();
      return $b;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->middleware('auth');
      $course_list = Course::get();
      return view('CourseCMS/index', compact('course_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        return view('CourseCMS/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->middleware('auth');
      $CreateCourse = new CourseCreate(0, $request->input('course'),$request->input('sn'),$request->input('req_hrs'),$request->input('hps'),$request->input('day'),$request->input('sched'),$request->input('fee'));
      $this->dispatch($CreateCourse);

      return \Redirect::route('adminpanel.index')
              ->with('message', 'New Course was added');
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
      $this->middleware('auth');
      $course_s = Course::find($id);
      return view('CourseCMS/edit', compact('course_s'));
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
      $this->middleware('auth');
      $updateCourse = new CourseUpdate($id, $request->input('course'),$request->input('sn'),$request->input('req_hrs'),$request->input('hps'),$request->input('day'),$request->input('sched'),$request->input('fee'));
      $this->dispatch($updateCourse);

      return \Redirect::route('adminpanel.index')
              ->with('message', 'The Course was edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete_course = new CourseDelete($id);
      $this->middleware('auth');
      $this->dispatch($delete_course);
      return \Redirect::route('adminpanel.index')
              ->with('message', 'Course #' . $id . ' already deleted to the list');
    }
}
