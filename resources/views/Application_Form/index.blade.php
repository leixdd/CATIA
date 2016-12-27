@extends('layout.home')


@section('title', 'CATIA')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">List of Applicants</div>
    <div class="panel-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Middlename</th>
                <th>Age</th>
                <th>City</th>
                <th>Country</th>
              </tr>
            </thead>
            <tbody>
              @foreach($app_pro as $list_app)
              <tr>
                <td>{{$list_app->id}}</td>
                <td>{{$list_app->first_name}}</td>
                <td>{{$list_app->last_name}}</td>
                <td>{{$list_app->middle_name}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
@stop
