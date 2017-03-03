@extends('layouts.app')

@section('content')

  @if(Session::has('message'))
    <div class="alert alert-info fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{Session::get('message')}}
    </div>
  @endif

  <div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <h5 class="text-center">
      Welcome Back! {{ Auth::user()->name }}
    </h5>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row">
            <div class="col-sm-3">
              <span class="glyphicon glyphicon-briefcase" style="font-size: 50pt"></span>
            </div>
            <div class="col-md-9">
              <h3>{{ $app_count }} Applicants</h3>
            </div>
          </div>
        </div>
        <div class="panel-body">
          View All Applicants<a href="/getCourses"><span style="float: right;" class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-sm-3">
              <span class="glyphicon glyphicon-comment" style="font-size: 50pt"></span>
            </div>
            <div class="col-md-9">
              <h3>{{ $msg_count }} Inqueries</h3>
            </div>
          </div>
        </div>
        <div class="panel-body">
          View All Messages (Test Mode) <a href="/msg_nt"><span style="float: right;" class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
      </div>
      </div>

    <div class="col-md-4">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row">
            <div class="col-sm-3">
              <span class="glyphicon glyphicon-tasks" style="font-size: 50pt"></span>
            </div>
            <div class="col-md-9">
              <h3>{{ $use_count }} Admins</h3>
            </div>
          </div>
        </div>
        <div class="panel-body">
          View All Issues (Test Mode)<a href="/list_pending"><span style="float: right;" class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
      </div>
      </div>
    </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Feeds<a href="/msg_nt" style="text-decoration:none; color: white; float: right;" class="glyphicon glyphicon-circle-arrow-right"></a>
        </div>

        <div class="panel-body">
          <div class="list-group">
            @foreach ($list as $key => $value)
              <li value="{{ $value->id }}" class="list-group-item modal-click" data-toggle="modal" data-target="#deleteModal">
                <h4 class="list-group-item-heading">{{ $value->title }}</h4>
                <hr></hr>
                <blockquote class="list-group-item-text h5">
                  {{ $value->messagez }}
                </blockquote>
              </li>
            @endforeach
          </div>


        <div style="font-size: 24pt">
          {{ $list->links()}}
        </div>

        </div>

        <div class="panel-footer">
          Click one to view the top post .. or View More to See All
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Visitor's Logs - Total Visitors  "<b>{{$visit_count}}</b>"</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-condensed table-hover" id="dataTable">
              <thead>
                <tr>
                  <th>id</th>
                  <th>IP Address</th>
                  <th>Visit Date</th>
                  <th>Visit Time</th>
                </tr>
              </thead>
              <tbody>
                @foreach($visitors as $v)
                  <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->ip}}</td>
                    <td>{{$v->visit_date}}</td>
                    <td>{{$v->visit_time}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <center>{{ $visitors->render()}}</center>

        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete or Reply?</h4>
        </div>
        <div class="modal-body">
          <?php $app_id = 0; ?>
          @foreach($list as $list_app)
            <?php
            $app_id = 0;
            if($list_app->id !== null){
              $app_id = $list_app->id;
            } ?>
          @endforeach
          {!! Form::open(array('route' => ['sendbm.store'], 'enctype' => 'multipart/form-data')) !!}
          <div class="row">
            <div class="col-lg-6">
              <h1 style=""><b><span style="color: #209eeb;">| </span>Reply</b></h1>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('r_email', 'Recipients Email') !!}
                    {!! Form::email('r_email', $value = null, $attributes = ['required','class' => 'em_ajx form-control', 'name' => 'r_email']) !!}
                    {!! Form::hidden('r_email', $value = $app_id, $attributes = ['class' => 'form-control', 'name' => 'r_id']) !!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    {!! Form::label('r_name', 'Recipients Name') !!}
                    {!! Form::text('r_name', $value = null, $attributes = ['required','class' => 'name_ajx form-control', 'name' => 'r_name']) !!}
                  </div>
                </div>
              </div>
              <div class="form-group">
                {!! Form::label('s_msg', 'Message') !!}
                {!! Form::textarea('s_msg', $value = null, $attributes = ['required','class' => 'msg_ajx form-control', 'name' => 's_msg']) !!}
              </div>
              {!! Form::submit('Send', $attributes = ['class' => 'btn btn-success btn-md form-control']); !!}
            {!! Form::close() !!}



            {!! Form::open(array('route' => ['msg_nt.destroy', $app_id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data')) !!}
                <h1 style=""><b><span style="color: #209eeb;">| </span>Delete</b></h1>
                <button type="submit" class="form-control btn btn-md btn-danger">Yes, Please Delete the Message.</button>
            {!! Form::close() !!}
            </div>
            <div class="col-lg-6">
              <h1 style=""><b><span style="color: #209eeb;">| </span>Conversation History</b></h1>
              <div class="list-group" id="lst"style="height: 500px;overflow-y: auto;">

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


<!-- <script src="/js/tablesorter/jquery.tablesorter.js"></script>
<script src="/js/tablesorter/tables.js"></script>
[if lte IE 8]><script src="/js/excanvas.min.js"></script>
<script src="/js/flot/jquery.flot.js"></script>
<script src="/js/flot/jquery.flot.tooltip.min.js"></script>
<script src="/js/flot/jquery.flot.resize.js"></script>
<script src="/js/flot/jquery.flot.pie.js"></script>
<script src="/js/flot/chart-data-flot.js"></script> -->
@endsection
