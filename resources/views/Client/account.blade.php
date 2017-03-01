@extends('layouts.clientbase')

<?php $name_of_std = Session::get('std') ?>
@section('title', $name_of_std . ' - CATIA STUDENT' )

@section('username', $name_of_std . ' &nbsp;')

@section('content')

<h1 style="padding-bottom: 50px;"><b><span style="color: #209eeb;">| </span>Announcements</b></h1>

<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        Your Account
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


<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-capitalize">Preview of this post</h4>
        </div>
        <div class="modal-body">
          <h4 class="post_title text-capitalize"></h4>
          <div class="row">
            <div class="col-lg-12">
              <img class="img-responsive post_thumb" />
              <blockquote class="post_content"></blockquote>
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
