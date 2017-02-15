@extends('layouts.app')


@section('title', 'CATIA')

@section('content')

<div class="panel panel-primary">
  <div class="panel-heading">
    Search
  </div>
  <div class="panel-body">
    {!! Form::open(['url' => '/search', 'class' => 'form-horizontal']) !!}
      <div class="col-lg-6">
        <div class="form-group">
          {!! Form::label('search_name', 'Search by First Name or Last Name and could be Middle Name') !!}
          {!! Form::text('search_name', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'search_name']) !!}
          {!! Form::hidden('path', $value = $supereme, $attributes = ['class' => 'form-control', 'name' => 'path']) !!}
          {!! Form::hidden('accessx', $value = $emerghed, $attributes = ['class' => 'form-control', 'name' => 'accessx']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Search', $attributes = ['class' => 'btn btn-success btn-md form-control']); !!}
        </div>

      </div>
    {!! Form::close() !!}
    <div class="col-lg-4 col-md-offset-1">
        <div class="form-group">
          {!! Form::label('', 'Controls') !!}
          @if($status == 'Pending')
         <a id="printy" type="button" class="btn btn-primary form-control">Print the Results</a>
         @else
         <button id="printz" class="btn btn-primary form-control">Print the Results</button>
         @endif
        </div>
    </div>
  </div>
</div>

  <div class="panel panel-primary">
    <div class="panel-heading">List of All {{$status}} &nbsp;Applicants - {{$course}}</div>
    <div class="panel-body">

      @if($condition == 'a')
      <div class="row">
        <div class="col-lg-12 text-center">
          No Data
        </div>
      </div>
      @else
        <h1 style="padding-top: 25px; margin-bottom: 2%;"><b><span style="color: #209eeb;">| </span>List of all {{$status}}  clients</b></h1>
        @if($status == 'Pending')
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-hover" id="dataTable">

            <thead>
              <tr>
                <th>id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Middlename</th>
                <th class="text-center">Course_Fee</th>
                <th class="text-center">Payment</th>
                <th class="text-center">Balance</th>
                <th class="text-center">Expire Date</th>
                <th class="text-center">Serial</th>
                <th class="text-center">Actions</th>
                <th class="text-center">Delete?</th>
              </tr>
            </thead>
            <tbody>
              <?php $globalc = 0; ?>
              @foreach($app_pro as $list_app)
                @foreach($list_app->other_infos as $list_app3)
                  @if($today === $list_app3->exp_date)
                    <?php $globalc = 1; ?>
                  @endif
                @endforeach
                  @if($globalc === 1)
                    <tr class="danger">
                  @else
                    <tr>
                  @endif
                      <td>{{$list_app->id}}</td>
                      <td>{{$list_app->first_name}}</td>
                      <td>{{$list_app->last_name}}</td>
                      <td>{{$list_app->middle_name}}</td>
                      <td class="text-center">{{$fee}}</td>
                      @foreach($list_app->other_infos as $list_app3)
                        <td class="text-center">{{$list_app3->App_Payment}}</td>
                        <td class="text-center">{{$list_app3->remBal}}</td>
                        <td class="text-center">{{$list_app3->exp_date}}</td>
                        <td class="text-center">{{$list_app3->serial}}</td>
                      @endforeach
                      <td class="text-center">
                        <button class="btn btn-xs btn-primary modal-open" data-toggle="modal" data-target="#viewModal" value="{{$list_app->id}}"><span class="glyphicon glyphicon-user"></span></button>
                        &nbsp;|&nbsp;<a type="button" class="btn btn-xs btn-success" href="/application/{{$list_app->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        &nbsp;|&nbsp;<a type="button" class="btn btn-xs btn-info" href="/trans/{{$list_app->id}}/edit"><span class="glyphpro glyphpro-money"></span>&nbsp;&nbsp;&nbsp;Transaction</a>
                      </td>
                      <td class="text-center">
                        {!! Form::open(array('action' => ['ApplicantController@destroy', $list_app->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data')) !!}
                            <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                      </td>
                    </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-hover" id="dataTable">

            <thead>
              <tr>
                <th>id</th>
                <th>batch</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Middlename</th>
                <th class="text-center">Contact</th>
                <th class="text-center">Address</th>
                <th class="text-center">Actions</th>>
                <th class="text-center">Delete?</th>
              </tr>
            </thead>
            <tbody>
              @foreach($app_pro as $list_app)
              <tr>
                <td>{{$list_app->id}}</td>
                <td>{{$list_app->batch}}</td>
                <td>{{$list_app->first_name}}</td>
                <td>{{$list_app->last_name}}</td>
                <td>{{$list_app->middle_name}}</td>
                <td>{{$list_app->contact}}</td>
                <td>{{$list_app->num_street}}&nbsp;{{$list_app->barangay}}&nbsp;{{$list_app->district}}&nbsp;{{$list_app->city}}&nbsp;{{$list_app->province}}&nbsp;{{$list_app->region}}</td>
                <td class="text-center">
                  <button class="btn btn-xs btn-primary modal-open" data-toggle="modal" data-target="#viewModal" value="{{$list_app->id}}"><span class="glyphicon glyphicon-user"></span></button>
                  &nbsp;|&nbsp;<a type="button" class="btn btn-xs btn-success" href="/application/{{$list_app->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                  &nbsp;|&nbsp;<a type="button" class="btn btn-xs btn-info" href="/conp/{{$list_app->id}}"><span class="icon-print"></span></a>
                   @if ($list_app->account_active !== 1)
                    &nbsp;|&nbsp;<a type="button" class="btn btn-xs btn-warning" href="/appaccx/{{$list_app->id}}/edit"><span class="icon-group"></span></a>
                  @endif
                  @if ($list_app->cert !== 1)
                   &nbsp;|&nbsp;<a type="button" class="btn btn-xs btn-default" href="/cert/{{$list_app->id}}/edit"><span class="icon-save"></span></a>
                  @endif
                </td>
                <td class="text-center">
                  {!! Form::open(array('action' => ['ApplicantController@destroy', $list_app->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data')) !!}
                      <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                  {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      {{ $app_pro->render()}}

    </div>
  </div>

<h1 style="padding-top: 25px;"><b><span style="color: #209eeb;">| </span>Print Preview</b></h1>
  <div id="pdb" class="">
    <div class="row">
      <div style="margin-bottom: 2%;">
          <img style="margin-left: 25%" class="img-responsive" src="/images/CATIA_IMAGES/Catia_Logo.png"  width="5%">
      </div>
      <div class="col-lg-6 col-lg-offset-1" style="margin-bottom: 3%;">
        Gate 2, Tesda Complex East Service Road, South Superhighway Taguig City
      </div>
      <div class="col-lg-12 col-md-offset-1" style="margin-bottom: 3%;">
          <b style="font-size: 16pt">{{$course}} - {{$status}} Applicants</b>
      </div>
    </div>
      <table id="db" class="table table-bordered table-condensed table-hover" style="width:100%">
          <tr>
            <th>id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Middlename</th>
            @if($status == 'Pending')
            <th class="text-center">Course Fee</th>
            <th class="text-center">Payment</th>
            <th class="text-center">Balance</th>
            @else
            <th class="text-center">Contact</th>
            <th class="text-center">Address</th>
            @endif
          </tr>
          <tbody>
          </tbody>
      </table>
  </div>
  @endif
  <div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-capitalize" id="modtitle"></h4>
          </div>
          <div class="modal-body">
            <div class="panel panel-primary">
              <div class="panel-heading">Manpower Profile</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-4">
                    <img src="" id="applicant_image" class="img-responsive"/>
                  </div>
                  <div class="col-md-8">
                    <div class="panel panel-default">
                      <div class="panel-heading">Applicant's Name - (Lastname, Firstname Middlename.)</div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div id="last_name" class="text-uppercase text-center">
                            Sample
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div id="first_name" class="text-uppercase text-center">
                            Sample
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div id="middle_name" class="text-uppercase text-center">
                            Sample
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">Applicant's Complete Permanent Mailing Address</div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-4 small">
                            <b>Number, Street</b> <p id="num_street" ></p>
                            <b>Barangay</b> <p id="barangay" ></p>
                            <b>District</b> <p id="district" ></p>
                          </div>
                          <div class="col-md-4 small">
                            <b>City/Municipality</b> <p id="city" ></p>
                            <b>Province</b> <p id="province" ></p>
                            <b>Region</b> <p id="region" ></p>
                          </div>
                          <div class="col-md-4 small">
                            <b>Email Address</b> <p id="email" ></p>
                            <b>Contact #</b> <p id="contact" ></p>
                            <b>Nationality</b> <p id="nationality" ></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading">Supporting Informations</div>
              <div class="panel-body small">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">Personal Informations</div>
                      <div class="panel-body">
                        <p class=""><b>Sex:&nbsp;&nbsp;</b><span id="sex"></span></p>
                        <p class=""><b>Civil Status:&nbsp;&nbsp;</b><span id="cv_status"></span></p>
                        <p class=""><b>Employment Status:&nbsp;&nbsp;</b><span id="emp_status"></span></p>
                        <p class=""><b>Birthdate:&nbsp;&nbsp;</b><span id="bdate"></span></p>
                        <p class=""><b>Birthplace:&nbsp;&nbsp;</b><span id="bplace"></span></p>
                        <p class=""><b>Educational Attainment:&nbsp;&nbsp;</b><span id="educ_attain"></span></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">Clients Classification</div>
                      <div class="panel-body">
                        <p class=""><b>Classified as:&nbsp;</b><span id="classification"></span></p>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <b>Current Applicant Status: </b>
                        <h2 id="is_active" class="text-center text-uppercase text-danger"></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

    </div>
  </div>




@endsection
