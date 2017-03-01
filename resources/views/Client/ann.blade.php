@extends('layouts.clientbase')

<?php $name_of_std = Session::get('std') ?>
@section('title', $name_of_std . ' - CATIA STUDENT' )

@section('username', $name_of_std . ' &nbsp;')

@section('content')
<section class="container-size-200 container-color-white">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-left wow fadeInUp lightx split-top">
          <h1 class="header-text-style"><font class="line-text-style">|</font>Announcements</h1>
        </div>
      </div>
    </div>

    <div class="row split-side">
      <div class="col-lg-12">
        <div class="text-justify lightx split-top">
          <ul class="list-group">
            @foreach ($ann as $key)
              <li class="list-group-item">
                <div class="row">
                  <div class="col-lg-2">
                    <img src="{{$key->post_thumb}}" class="img-responsive" />
                  </div>
                  <div class="col-lg-10">
                    <h2 class="list-group-item-heading">{!! $key->post_title !!}</h2>
                    <p class="list-group-item-text">{!! html_entity_decode(str_limit($key->post_content, 300))!!}</p>
                    <button class="btn btn-md btn-primary view-m-post" data-toggle="modal" data-target="#viewModal" value="{{$key->id}}">View</button>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

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
