@extends('layouts.app')


@section('content')

@if(Session::has('message'))
  <div class="alert alert-info fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('message')}}
  </div>
@endif

  @foreach($errors->all() as $error)
  <div class="alert alert-danger">
    {{$error}}
  </div>
  @endforeach


    <div class="panel panel-primary">
      <div class="panel-heading"><span class="glyphpro glyphpro-money"></span>&nbsp;&nbsp;&nbsp;Transaction</a></div>
      <div class="panel-body">
        {!! Form::open(array('action' => ['Transac@update', $app_single->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
        {{ csrf_field() }}
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5>#{{$app_single->id}}&nbsp;-&nbsp;{{$app_single->last_name}},&nbsp;{{$app_single->first_name}}&nbsp;{{$app_single->middle_name}}</h5>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <h2>Course: <b>{{$course_x}}</b></h2>
                <br />
                <h4>Course Fee: <b>{{$fee}} Pesos</b></h4>
                <h4>Remaining Balance: <b>{{$rem}} Pesos</b></h4>
                <br />
                <h4>Total Paid Amount: <b>{{$tot}} Pesos</b></h4>
                <br />
                <br />
                <br />
                @if($rem == 0)

                    <a type="button" class="btn btn-lg btn-info" href="/toFullPaid/{{$app_single->id}}"><span class="glyphpro glyphpro-ok_2"></span>&nbsp;&nbsp;&nbsp;Confirm this Applicant</a>
                @else
                <div class="form-group">
                  {!! Form::label('app_pay', 'Enter Payment') !!}
                  {!! Form::text('app_pay', 0, $attributes = ['required','class' => 'form-control', 'name' => 'app_pay']) !!}
                </div>
                {!! Form::submit('Apply this amount',$attributes = ['class' => 'btn btn-success btn-md']); !!}
                @endif
              </div>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>



@endsection
