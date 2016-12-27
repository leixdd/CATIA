<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;

use CATIA\Http\Requests;
use CATIA\post;
use CATIA\Commands\PostCommand;
use CATIA\Http\Requests\PostRequest;
use CATIA\Commands\PostUpdate;
use CATIA\Commands\Deleterpost;

class post_admin extends Controller
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
        $post_list = post::get();
        return view('post/post_list', compact('post_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/post_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

      $applicant_image = $request->file('thumb');

      if ($applicant_image) {
          $applicant_image_filename = '/images/CMS/thumbnails/' . $applicant_image->getClientOriginalName();
          $applicant_image->move(public_path('images/CMS/thumbnails/'), $applicant_image_filename);
      } else {
          $applicant_image_filename = null;
      }

      //list commands

      $post = new PostCommand(0, $request->input('title'),$request->input('cnt'),$request->input('user'),$applicant_image_filename);
      $this->dispatch($post);

      return \Redirect::route('adminpanel.index')
              ->with('message', 'Posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_list = post::find($id);
        return $post_list;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post_single = post::find($id);
      return view('post/post_edit', compact('post_single'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
      $applicant_image = $request->file('thumb');
      $current_applicant_image = post::find($id)->post_thumb;

      if ($applicant_image) {
          $applicant_image_filename = '/images/CMS/thumbnails/' . $applicant_image->getClientOriginalName();
          $applicant_image->move(public_path('/images/CMS/thumbnails/'), $applicant_image_filename);
      } else {
          $applicant_image_filename = $current_applicant_image;
      }

      $updatePost = new PostUpdate($id, $request->input('title'),$request->input('cnt'),$request->input('user'),$applicant_image_filename);
      $this->dispatch($updatePost);

      return \Redirect::route('adminpanel.index')
              ->with('message', 'The Post was edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete_command = new Deleterpost($id);

      $this->dispatch($delete_command);
      return \Redirect::route('adminpanel.index')
              ->with('message', 'Post #' . $id . ' already deleted to the list');
    }
}
