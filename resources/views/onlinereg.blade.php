<!DOCTYPE html> <!--localhost:8000/adminpanel 58912345-->
<html lang="en">
<head>
	<title>Catia Registration</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<!-- <link rel="stylesheet" href="/css/fontcss.css">-->
	<link rel="stylesheet" href="/css/animate.css">
	<link rel="stylesheet" href="/css/indexstyle.css">
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/wow.js"></script>
	<script src="/js/Anim.js"></script>

	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100,
		});
		wow.init();
	</script>
</head>
<body>
	<section id="onlineregistration"> <!-- HOME Section <img src="/images/CATIA_IMAGES/catialogo.png" style="position: absolute; left: 29px;top:45px;"> -->
		<div class="onlineregis">
			<nav class="navbar lightx">
				<div class="container-fluid">
					<div class="navbar-header"> <!--GLYPHICON menu / logo-->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-header">
							<span style="color: #ffffff; font-size: 25pt;" class="glyphicon glyphicon-menu-hamburger"></span>
						</button>
						<img src="/images/CATIA_IMAGES/catialogo.png" style="position: absolute; left: 29px;top:45px;">
					</div>
					<div class="collapse navbar-collapse" id="nav-header">
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="/">Home</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="">About<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/history">History</a></li>
									<li><a href="/misvi">Mission & Vision</a></li>
									<li><a href="/commi">Commitment</a></li>
									<li><a href="/news">Catia News</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="">Admission<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/registrationpro">Registration Procedure</a></li>
									<li><a href="/onlinereg">Online Registration</a></li>
									<li><a href="/onlinefaq">Online FAQ</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="">Program<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/acad">Academic Courses</a></li>
									<li><a href="/facility">Facilities</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="">Student<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/studlogin">Login</a></li>
									<li><a href="/gallery">Gallery</a></li>
								</ul>
							</li>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="text-left wow fadeInUp lightx" style="padding-top: 40px;">
							<h1 style="font-size: 36pt; font-weight: bold;"><font style="font-size: 50pt; font-weight: bold; color: #209eeb">|</font>Online Registration</h1>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-lg-12" style="padding-top:40px;">
					<div class="panel panel-default">
						<div class="panel-heading">Register of New Applicant</div>
						<div class="panel-body">
							{!! Form::open(array('action' => 'ApplicantController@store', 'enctype' => 'multipart/form-data')) !!}
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
												{!! Form::select('city', array('0' => 'Select Your City'), 'Select Your City', $attributes = [ 'required','class' => 'form-control city-enter', 'name' => 'city']) !!}
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												{!! Form::label('province', 'Province') !!}
												{!! Form::select('province',array('0' => 'Select Your Province'), 'Select Your Province', $attributes = ['required','class' => 'form-control city-province', 'name' => 'province']) !!}
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												{!! Form::label('region', 'Region') !!}
												{!! Form::select('region', array('0' => 'Select Your Region'), 'Select Your Region', $attributes = ['required','class' => 'form-control city-region', 'name' => 'region']) !!}
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
												'30' => '30'), '1', $attributes = ['class' => 'form-control', 'name' => 'bdate_day']) !!}
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
												'Rebel Returnees' => 'Rebel Returnees'
												), 'No Grade Completed', $attributes = ['class' => 'form-control', 'name' => 'classification']) !!}
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
								{!! Form::submit('Submit your Application',$attributes = ['class' => 'btn btn-success btn-lg']); !!}
							</div>
							{!! Form::close() !!}
						</div>
					</div>
		</div>
					</div>
				</div>
			</div>
			
	</section><!-- End Section -->
	<section id="contact">
		<div class="container-fluid img-responsive text-center lightx" style="height: 40vh;background-color: #3e3c3c;">
			<div class="row">
				<div class="col-lg-12" style="color:#ffffff;padding-top:20px;">
					<img src="images/CATIA_IMAGES/catialogo1.png">
					<p style="padding-top:10px; font-size:18pt; margin:0;">Catia Foundation Inc.</p>
					<p style="font-size:12pt;">Gate 2, Tesda Complex East Service Road, South Superhighway Taguig City</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-1">
					<img src="images/CATIA_IMAGES/fblogo.png">
				</div>
				<div class="col-md-2">
					<img src="images/CATIA_IMAGES/gmaillogo.png">
				</div>
				<div class="col-md-1">
					<img src="images/CATIA_IMAGES/twitterlogo.png">
				</div>
				<div class="col-md-4"></div>
				
			</div>
		</div>
	</section>
