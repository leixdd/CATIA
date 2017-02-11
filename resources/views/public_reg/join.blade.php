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
				<h1 style="font-size: 36pt; font-weight: bold;"><font style="font-size: 50pt; font-weight: bold; color: #209eeb">|</font>Online Registration</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="home">
			<div class="row">
		<div class="col-lg-12" style="margin-top: 5%;">
		  @if(Session::has('message'))
			<div class="alert alert-info fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{Session::get('message')}}
			</div>
		 @endif
			@foreach($errors->all() as $error)
			<div class="alert alert-danger">
				{{$error}}
			</div>
			@endforeach

			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					{!! Form::open(array('action' => 'pubRegis@store', 'enctype' => 'multipart/form-data' , 'class' => 'xzf')) !!}
					<div class="panel panel-primary">
						<div class="panel-heading">Manpower Profile</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('last_name', 'Lastname') !!}
										{!! Form::text('last_name', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'last_name']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('first_name', 'Firstname') !!}
										{!! Form::text('first_name', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'first_name']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('middle_name', 'Middlename') !!}
										{!! Form::text('middle_name', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'middle_name']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('num_street', 'Number, Street') !!}
										{!! Form::text('num_street', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'num_street']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('barangay', 'Barangay') !!}
										{!! Form::text('barangay', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'barangay']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('district', 'District') !!}
										{!! Form::text('district', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'district']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('city', 'City/Municipality') !!}
										{!! Form::select('city', array('' => 'Select Your City'), 'Select Your City', $attributes = [ 'required','class' => 'form-control city-enter', 'name' => 'city']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('province', 'Province') !!}
										{!! Form::select('province',array('' => 'Select Your Province'), 'Select Your Province', $attributes = ['required','class' => 'form-control city-province', 'name' => 'province']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('region', 'Region') !!}
										{!! Form::select('region', array('' => 'Select Your Region'), 'Select Your Region', $attributes = ['required','class' => 'form-control city-region', 'name' => 'region']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('email', 'Email Address/Facebook Account') !!}
										{!! Form::text('email', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'email']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('contact', 'Contact No') !!}
										{!! Form::text('contact', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'contact']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('nationality', 'Nationality') !!}
										{!! Form::text('nationality', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'nationality']) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">Personal Information</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('sex', 'Sex') !!}
										{!! Form::select('sex', array('male' => 'Male', 'female' => 'Female'), null, $attributes = ['placeholder' => 'Choose your sex', 'class' => 'form-control', 'name' => 'sex']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('cv_status', 'Civil Status') !!}
										{!! Form::select('cv_status', array('single' => 'Single', 'married' => 'Married', 'widow/er' => 'Widow/er', 'seperated' => 'Seperated'), 'Single', $attributes = ['class' => 'form-control', 'name' => 'cv_status']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('emp_status', 'Employment Status (Before training)') !!}
										{!! Form::select('emp_status', array('employed' => 'Employed', 'unemployed' => 'Unemployed'), 'Unemployed', $attributes = ['class' => 'form-control', 'name' => 'emp_status']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('bplace_city', 'Birthplace - City') !!}
										{!! Form::select('bplace_city', array('0' => 'Select Your City'), 'Select Your City', $attributes = [ 'required','class' => 'form-control city-enter', 'name' => 'bplace_city']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('bplace_province', 'Birthplace - Province') !!}
										{!! Form::select('bplace_province',array('0' => 'Select Your Province'), 'Select Your Province', $attributes = ['required','class' => 'form-control city-province', 'name' => 'bplace_province']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('bplace_region', 'Birthplace - Region') !!}
										{!! Form::select('bplace_region', array('0' => 'Select Your Region'), 'Select Your Region', $attributes = ['required','class' => 'form-control city-region', 'name' => 'bplace_region']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										{!! Form::label('bdate_month', 'Month of Birth') !!}
										{!! Form::select('bdate_month', array(
										'January' => 'January',
										'February' => 'February',
										'March' => 'March',
										'April' => 'April',
										'May' => 'May',
										'June' => 'June',
										'July' => 'July',
										'August' => 'August',
										'September' => 'September',
										'October' => 'October',
										'November' => 'November',
										'December' => 'December'), 'January', $attributes = ['class' => 'form-control', 'name' => 'bdate_month']) !!}
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										{!! Form::label('bdate_day', 'Day of Birth') !!}
										{!! Form::select('bdate_day', array(
										'1' => '1',
										'2' => '2',
										'3' => '3',
										'4' => '4',
										'5' => '5',
										'6' => '6',
										'7' => '7',
										'8' => '8',
										'9' => '9',
										'10' => '10',
										'11' => '11',
										'12' => '12',
										'13' => '13',
										'14' => '14',
										'15' => '15',
										'16' => '16',
										'17' => '17',
										'18' => '18',
										'19' => '19',
										'20' => '20',
										'21' => '21',
										'22' => '22',
										'23' => '23',
										'24' => '24',
										'25' => '25',
										'26' => '26',
										'27' => '27',
										'28' => '28',
										'29' => '29',
										'30' => '30',
										'31' => '31'), '1', $attributes = ['class' => 'form-control', 'name' => 'bdate_day']) !!}
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										{!! Form::label('bdate_year', 'Year of Birth') !!}
										{!! Form::text('bdate_year', $value = null, $attributes = ['required','class' => 'form-control yb', 'name' => 'bdate_year']) !!}
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										{!! Form::label('age', 'Age') !!}
										{!! Form::text('age', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'age']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										{!! Form::label('educ_attain', 'Educational Attainment Before the Training (Trainee)') !!}
										{!! Form::select('educ_attain', array(
										'No Grade Completed' => 'No Grade Completed',
										'Pre-School (Nursery/Kinder/Prep)' => 'Pre-School (Nursery/Kinder/Prep)',
										'Elementary Graduate' => 'Elementary Graduate',
										'Elementary Undergraduate' => 'Elementary Undergraduate',
										'High School Graduate' => 'High School Graduate',
										'High School Undergraduate' => 'High School Undergraduate',
										'Post Secondary' => 'Post Secondary',
										'College Undergraduate' => 'College Undergraduate',
										'College Graduate or Higher' => 'College Graduate or Higher'
										), 'No Grade Completed', $attributes = ['class' => 'form-control', 'name' => 'educ_attain']) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">Learner/Trainee/Student (Clients) Classification </div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										{!! Form::label('classification', '(Clients) Classification') !!}
										{!! Form::select('classification', array(
										'Persons with Disabilities (PWDs)' => 'Persons with Disabilities (PWDs)',
										'OFW Repatriate' => 'OFW Repatriate',
										'Solo Parent' => 'Solo Parent',
										'Displaced Worker (Local)' => 'Displaced Worker (Local)',
										'Victims/Survivors of Human Trafficking' => 'Victims/Survivors of Human Trafficking',
										'Indigenous People &amp; Cultural Communities' => 'Indigenous People &amp; Cultural Communities',
										'OFW' => 'OFW',
										'OFW Dependent' => 'OFW Dependent',
										'Rebel Returnees' => 'Rebel Returnees','Student' => 'Student', 'Others' => 'Others'
										), 'No Grade Completed', $attributes = ['class' => 'form-control', 'name' => 'classification']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										{!! Form::label('course', 'Course want to take') !!}
										{!! Form::select('course', array('0' => 'Select Your Course'), 'Select Your Course', $attributes = ['required', 'class' => 'form-control course', 'name' => 'course']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										{!! Form::label('payment', 'Payment') !!}
										{!! Form::select('payment', array(
										'FULL' => 'FULL PAYMENT',
										'HALF' => 'HALF PAYMENT'), 'FULL', $attributes = ['class' => 'form-control', 'name' => 'payment']) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">Upload Your Image</div>
						<div class="panel-body">
							{!! Form::label('applicant_image', 'Upload Image') !!}
							{!! Form::file('applicant_image', $attributes = ['required', 'class' => 'btn btn-default']) !!}
						</div>
					</div>
					<div class="center-block text-center">
					    <button type="button" class="rd btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Submit your Application</button>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button id="xclose" type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ready to print</h4>
      </div>
      <div class="modal-body">
			<div class="center-block text-center">
				<div class="rs-main alert alert-info">
					<p id="rs"> </p>
				</div>
				{!! Form::submit('Print',$attributes = ['class' => 'by btn btn-success btn-lg', 'hidden']); !!}
				<button type="button" hidden class="bx">xcxzc</button>
			</div>
      </div>
      <div class="modal-footer">
        <button class="xclose" type="button" class="btn btn-default" hidden>Go back to main</button>
      </div>
    </div>

  </div>
</div>
{!! Form::close() !!}
@endsection
