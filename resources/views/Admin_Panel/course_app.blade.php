@extends('layouts/app')

@section('content')
  <h1 style="padding-bottom: 50px;"><b><span style="color: #209eeb;">| </span>List of Courses</b></h1>

  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($b as $key)
                <tr>
                  <td>{{$key->id}}</td>
                  <td>{{$key->course}}</td>
                  <td class="text-center">
                    <a type="button" class="btn btn-xs btn-danger" href="/access/{{$key->id}}-0">&nbsp;Pending</a> | <a type="button" class="btn btn-xs btn-success" href="/access/{{$key->id}}-1">&nbsp;Confirm</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
