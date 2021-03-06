@extends('layouts/app')


@section('content')
  <h1 style="padding-bottom: 50px;"><b><span style="color: #209eeb;">| </span>Edit post</b></h1>

  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Create new post
        </div>
        <div class="panel-body">
            {!! Form::open(array('action' => ['post_admin@update', $post_single->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
              <div class="form-group">
                {!! Form::label('title', 'Post Title')!!}
                {!! Form::text('title', $value = $post_single->post_title, $attributes = ['class' => 'form-control', 'required', 'name' => 'title'])!!}
                {!! Form::hidden('user', $value = Auth::user()->name, $attributes = ['class' => 'form-control', 'name' => 'user'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('cnt', 'Post Content')!!}
                  {!! Form::textarea('cnt', $value = $post_single->post_content, $attributes = ['id' => 'summernote', 'class' => 'form-control', 'required', 'name' => 'cnt'])!!}
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('thumb', 'Post Thumbnail (Optional)')!!}
                    {!! Form::file('thumb', $attributes = ['class' => 'form-control btn btn-default']) !!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('announcement', 'Who should see this?')!!}
                    {!! Form::select('announcement', array('0' => 'Public', '1' => 'Private (Registered Applicants only)'), $post_single->is_main, $attributes = ['class' => 'form-control', 'name' => 'announcement']) !!}
                  </div>
                </div>
              </div>
              <div class="form-group">
                {!! Form::submit('POST',$attributes = ['class' => 'form-control btn btn-primary btn-xs']); !!}
              </div>
            {!! Form::close()!!}
        </div>
      </div>
    </div>
  </div>


@endsection
