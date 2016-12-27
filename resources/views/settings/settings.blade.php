@extends('layouts.app')

@section('title', 'CATIA')


@section('content')

  <h1 style="padding-bottom: 25px;"><b><span style="color: #209eeb;">| </span>Settings</b></h1>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Email Address for replying and sending messages
        </div>
        <div class="panel-body">
          
          {!! Form::open(array('action' => ['settings_v@update', $set->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
            <div class="form-group">
              {!! Form::label('u_name','Email Address')!!}
              {!! Form::email('u_name', $value = $set->setting_value, $attributes = ['required','class' => 'form-control', 'name' => 'u_name']) !!}
            </div>
          {!! Form::submit('submit', $attributes = ['class' => 'btn btn-primary form-control'])!!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
