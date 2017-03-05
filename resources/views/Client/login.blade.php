@extends('layout.home')

@section('content')
<center style="margin-top: 10%;">
    <img class="img-responsive" src="/images/CATIA_IMAGES/Catia_Logo.png"  width="15%">
</center>

<h3 class="text-center lightx" style="margin-bottom: 2%;"><a style="color :  #ffffff; text-decoration: none; "  href="{{ url('/students') }}">Catia Foundation Inc.</a></h3>

<div class="col-md-8 col-md-offset-2" style="padding-top: 2%;">
    <div class="panel panel-primary">
        <div class="panel-heading">Login</div>

        <div class="panel-body">
          @if(Session::has('message'))
            <div class="alert alert-info fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{Session::get('message')}}
            </div>
          @endif

                {!! Form::open(array('class' => 'form-horizontal', 'method' => 'POST', 'url' => '/portal' , 'enctype' => 'multipart/form-data')) !!}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label">Username</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('pwd') ? ' has-error' : '' }}">
                    <label for="pwd" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="pwd" type="password" class="form-control" name="pwd">

                        @if ($errors->has('pwd'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pwd') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i> Login
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
