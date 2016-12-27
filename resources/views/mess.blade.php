@extends('layouts.app')

@section('content')
  <h1 style=""><b><span style="color: #209eeb;">| </span>Messages List</b></h1>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Feeds<span style="float: right;" class="glyphicon glyphicon-circle-arrow-right"></span>
        </div>

        <div class="panel-body">
          <div class="list-group">
            @foreach ($list as $key => $value)
              <a href="" class="list-group-item" data-toggle="modal" data-target="#deleteModal">
                <h4 class="list-group-item-heading">{{ $value->title }}</h4>
                <hr></hr>
                <blockquote class="list-group-item-text h5">
                  {{ $value->messagez }}
                </blockquote>
              </a>
            @endforeach
          </div>


        <div style="font-size: 24pt">
          {{ $list->links()}}
        </div>

        </div>

        <div class="panel-footer">

        </div>
      </div>
    </div>

  </div>

  <div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete or Reply?</h4>
        </div>
        <div class="modal-body">
          @foreach($list as $list_app)
            <?php $app_id = $list_app->id; ?>

          {!! Form::open(array('route' => ['sendbm.store'], 'enctype' => 'multipart/form-data')) !!}
          <h1 style=""><b><span style="color: #209eeb;">| </span>Reply</b></h1>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Form::label('r_email', 'Recipients Email') !!}
                  {!! Form::email('r_email', $value = $list_app->email, $attributes = ['required','class' => 'form-control', 'name' => 'r_email']) !!}
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Form::label('r_name', 'Recipients Name') !!}
                  {!! Form::text('r_name', $value = $list_app->title, $attributes = ['required','class' => 'form-control', 'name' => 'r_name']) !!}
                </div>
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('s_msg', 'Message') !!}
              {!! Form::textarea('s_msg', $value = $list_app->messagez, $attributes = ['required','class' => 'form-control', 'name' => 's_msg']) !!}
            </div>
            {!! Form::submit('Send', $attributes = ['class' => 'btn btn-success btn-md form-control']); !!}
          {!! Form::close() !!}



          {!! Form::open(array('route' => ['msg_nt.destroy', $app_id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data')) !!}
              <h1 style=""><b><span style="color: #209eeb;">| </span>Delete</b></h1>
              <button type="submit" class="form-control btn btn-md btn-danger">Yes, Please Delete the Message.</button>
          {!! Form::close() !!}

          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

@endsection
