@extends('layouts.app')


@section('title', 'CATIA - New Applicant Account')

@section('content')
@foreach($errors->all() as $error)
<div class="alert alert-danger">
  {{$error}}
</div>
@endforeach

<div class="panel panel-default">
<div class="panel-heading">Set new account</div>
<div class="panel-body">
    {!! Form::open(array('action' => ['ApplicantAccounts@store', $app_single->id], 'enctype' => 'multipart/form-data')) !!}
      <div class="form-group">
        <input type="hidden" class="form-control" name="id_s" value='{!!$app_single->id !!}'/>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Set new account for {!! $app_single->last_name !!}, {!! $app_single->first_name!!}
        </div>
        <div class="panel-body">
          <div class="form-group">
            {!! Form::label('username', 'Username') !!}
            {!! Form::text('username', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'username']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('pwd', 'Password') !!}
            <!-- {!! Form::password('pwd', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'pwd']) !!} -->
            <input type="password" class="form-control" name="pwd" required=""/>
          </div>
        </div>
      </div>
      <div class="center-block text-center">
        {!! Form::submit('Submit your Application',$attributes = ['class' => 'btn btn-success btn-lg']); !!}
      </div>
    {!! Form::close() !!}
</div>
</div>


@endsection
