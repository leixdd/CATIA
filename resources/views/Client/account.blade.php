@extends('layouts.clientbase')

<?php $name_of_std = Session::get('std') ?>
@section('title', $name_of_std . ' - CATIA STUDENT' )

@section('username', $name_of_std . ' &nbsp;')

@section('content')

<h1 style="padding-bottom: 50px;"><b><span style="color: #209eeb;">| </span>Your Account</b></h1>

<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        Account
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-hover" id="dataTable">

            <thead>
              <tr>
                <th>Course</th>
                <th>Course Fee</th>
                <th>Payment</th>
                <th>Balance</th>
              </tr>
            </thead>
            <tbody>
              @foreach($app_pro as $list_app)
                <tr>
                  <td>{{$course}}</td>
                  <td class="text-center">{{$fee}}</td>
                  @foreach($list_app->other_infos as $list_app3)
                    <td class="text-center">{{$list_app3->App_Payment}}</td>
                    <td class="text-center">{{$list_app3->remBal}}</td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>



@endsection
