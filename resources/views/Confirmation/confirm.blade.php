@extends('layout.lay')
@section('content')
<style>
	body {
    	background-color: white;
	}
</style>
<script src="../js/execAjax.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="text-left wow fadeInUp lightx" style="padding-top: 40px;">
				<h1 style="font-size: 36pt; font-weight: bold;"><font style="font-size: 50pt; font-weight: bold; color: #209eeb">|</font>Confirmation</h1>
			</div>
		</div>
	</div>		
</div>
<div class="container">
	<div class="home">
			<div class="row">
		<div class="col-lg-12" style="margin-top: 5%;">
			@foreach($errors->all() as $error)
			<div class="alert alert-danger">
				{{$error}}
			</div>
			@endforeach

			<div class="panel panel-default">
				<div class="panel-heading">-</div>
				<div class="panel-body">
                    
					{!! Form::open(array('action' => 'redir_cnt@store', 'enctype' => 'multipart/form-data')) !!}

					<div class="center-block text-center">
						{!! Form::submit('Submit your Application',$attributes = ['class' => 'btn btn-success btn-lg']); !!}
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection