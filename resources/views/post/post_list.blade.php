@extends('layouts.app')

@section('content')
  <h1 style="padding-bottom: 50px;"><b><span style="color: #209eeb;">| </span>Post</b></h1>

  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Post list
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
              <tr>
                <th>id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Preview</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($post_list as $key)
                @if($key->is_main == 1)
                  <tr class="success">
                @else
                  <tr>
                @endif
                  <td>{{$key->id}}</td>
                  <td>{{$key->post_title}}</td>
                  <td>{{$key->post_author}}</td>
                  <td class="text-center">
                    <button class="btn btn-xs btn-primary modal-post" data-toggle="modal" data-target="#viewModal" value="{{$key->id}}"><span class="glyphicon glyphicon-user"></span></button>
                  </td>
                  <td class="text-center">
                    <a type="button" class="btn btn-xs btn-success" href="/post/{{$key->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                  </td>

                  <td class="text-center">
                    {!! Form::open(array('action' => ['post_admin@destroy', $key->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data')) !!}
                        <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></button>
                    {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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
