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
      <div class="panel-heading"><span class="glyphpro glyphpro-print"></span>&nbsp;&nbsp;&nbsp;Generate Certificate</a></div>
      <div class="panel-body">
        {!! Form::open(array('action' => ['cert_print@update', $app_single->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
        {{ csrf_field() }}
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5>#{{$app_single->id}}&nbsp;-&nbsp;{{$app_single->last_name}},&nbsp;{{$app_single->first_name}}&nbsp;{{$app_single->middle_name}}</h5>
          </div>
          <div class="panel-body">
            <div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										{!! Form::label('month', 'Month') !!}
										{!! Form::select('month', array(
										1 => 'January',
										2 => 'February',
										3 => 'March',
										4 => 'April',
										5 => 'May',
										6 => 'June',
										7 => 'July',
										8 => 'August',
										9 => 'September',
										10 => 'October',
										11 => 'November',
										12 => 'December'), 1, $attributes = ['class' => 'form-control', 'name' => 'month']) !!}
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										{!! Form::label('day', 'Day') !!}
										{!! Form::select('day', array(
										'1' => '1',
										'2' => '2',
										'3' => '3',
										'4' => '4',
										'5' => '5',
										'6' => '6',
										'7' => '7',
										'8' => '8',
										'9' => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20',
										'21' => '21',
										'22' => '22',
										'23' => '23',
										'24' => '24',
										'25' => '25',
										'26' => '26',
										'27' => '27',
										'28' => '28',
										'29' => '29',
										'30' => '30',
										'31' => '31'), '1', $attributes = ['class' => 'form-control', 'name' => 'day']) !!}
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										{!! Form::label('year', 'Year') !!}
										{!! Form::text('year', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'year']) !!}
									</div>
                </div>
                <div class="col-sm-3">
									<div class="form-group">
										{!! Form::label('ac', 'Action') !!}
									  {!! Form::submit('Generate Certificate',$attributes = ['class' => 'form-control btn btn-success btn-md']); !!}
									</div>
                </div>
                


                
               
              </div>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>



@endsection
