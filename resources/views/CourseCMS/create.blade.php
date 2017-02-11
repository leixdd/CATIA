@extends('layouts/app')


@section('content')
  <h1 style="padding-bottom: 50px;"><b><span style="color: #209eeb;">| </span>Add new course</b></h1>

  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="panel panel-primary">
        <div class="panel-heading">
          New Course
        </div>
        <div class="panel-body">
            {!! Form::open(array('action' => 'CMS_Course@store', 'enctype' => 'multipart/form-data')) !!}
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('course', 'Course Name')!!}
                    {!! Form::text('course', $value = null, $attributes = ['class' => 'form-control', 'required', 'name' => 'course'])!!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('sn', 'Short name(Alias)')!!}
                    {!! Form::text('sn', $value = null, $attributes = ['class' => 'form-control', 'required', 'name' => 'sn'])!!}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('req_hrs', 'Required Hours')!!}
                    {!! Form::number('req_hrs', $value = null, $attributes = ['class' => 'form-control', 'required', 'name' => 'req_hrs'])!!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('hps', 'Hours per day')!!}
                    {!! Form::number('hps', $value = null, $attributes = ['class' => 'form-control', 'required', 'name' => 'hps'])!!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('day', 'Days')!!}
                    {!! Form::number('day', $value = null, $attributes = ['class' => 'form-control', 'required', 'name' => 'day'])!!}
                  <!-- </br>
                      <label class="checkbox-inline">{!! Form::checkbox('day', 'M', null,  ['class' => '', 'required', 'name' => 'day']) !!} Monday</label>
                      <label class="checkbox-inline">{!! Form::checkbox('day', 'T', null,  ['class' => '', 'required', 'name' => 'day']) !!} Tuesday</label>
                      <label class="checkbox-inline">{!! Form::checkbox('day', 'W', null,  ['class' => '', 'required', 'name' => 'day']) !!} Wednesday</label>
                      <label class="checkbox-inline">{!! Form::checkbox('day', 'TH', null,  ['class' => '', 'required', 'name' => 'day']) !!} Thursday</label>
                      <label class="checkbox-inline">{!! Form::checkbox('day', 'F', null,  ['class' => '', 'required', 'name' => 'day']) !!} Friday</label>
                      <label class="checkbox-inline">{!! Form::checkbox('day', 'Sat', null,  ['class' => '', 'required', 'name' => 'day']) !!} Saturday</label>
                      <label class="checkbox-inline">{!! Form::checkbox('day', 'Sun', null,  ['class' => '', 'required', 'name' => 'day']) !!} Sunday</label> -->
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('sched', 'Schedule')!!}
                    {!! Form::text('sched', $value = null, $attributes = ['class' => 'form-control', 'required', 'name' => 'sched'])!!}
                  </div>
                </div>
              </div>

              <div class="form-group">
                {!! Form::label('fee', 'Course Fee')!!}
                {!! Form::number('fee', $value = null, $attributes = ['class' => 'form-control', 'required', 'name' => 'fee'])!!}
              </div>



              <div class="form-group">
                {!! Form::submit('SEND',$attributes = ['class' => 'form-control btn btn-primary btn-xs']); !!}
              </div>
            {!! Form::close()!!}
        </div>
      </div>
    </div>
  </div>


@endsection
