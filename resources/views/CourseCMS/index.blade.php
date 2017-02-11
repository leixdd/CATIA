@extends('layouts/app')

@section('content')
  <h1 style="padding-bottom: 50px;"><b><span style="color: #209eeb;">| </span>Course</b></h1>

  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Course List
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
              <tr>
                <th>id</th>
                <th>Course</th>
                <th>Alias</th>
                <th>Req Hours</th>
                <th>Hours/day</th>
                <th>Days</th>
                <th>Sched</th>
                <th>Fee</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($course_list as $key)
                <tr>
                  <td>{{$key->id}}</td>
                  <td>{{$key->course}}</td>
                  <td>{{$key->short_name}}</td>
                  <td>{{$key->req_hours}}</td>
                  <td>{{$key->hrs_per_day}}</td>
                  <td>{{$key->days}}</td>
                  <td>{{$key->sched}}</td>
                  <td>{{$key->fee}}</td>
                  <td class="text-center">
                    <a type="button" class="btn btn-xs btn-success" href="/course/{{$key->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                  </td>
                  <td class="text-center">
                      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-trash"></button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete this Course?</h4>
        </div>
        <div class="modal-body">
          @foreach($course_list as $list_app)
            <?php $app_id = $list_app->id; ?>
          @endforeach
          {!! Form::open(array('action' => ['CMS_Course@destroy', $app_id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data')) !!}
            <div class="text-center">
              <h4>Are you sure you want to delete this Course?</h4>
              <button type="submit" class="btn btn-lg btn-danger"><h1>Yes, Please Continue.</h1></span></button>
            </div>
          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>



@endsection
