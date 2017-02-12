<!DOCTYPE html>
<html lang="en">
<head>
	<title>Catia Foundation</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/animate.css">
	<link rel="stylesheet" href="/css/font-awesome.css">
	<link rel="stylesheet" href="/css/indexstyle.css">

	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/wow.js"></script>
	<script src="../js/Anim.js"></script>
	<script src="../js/tick.js"></script>
	<style>
/* Center the loader */

#loading {
   width: 100%;
   height: 100%;
   top: 0;
   left: 0;
   position: fixed;
   display: block;
   background-color: #209eeb;
   z-index: 99;
   text-align: center;
}


#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
	color: #fff;
}

.loadx{
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 10px solid #fff;
  border-bottom: 10px solid #fff;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


</style>
<script>
	$(window).load(function() {
		$('#loading').slideUp("slow");
	});

		wow = new WOW({
			animateClass: 'animated',
			offset: 100,
		});
		wow.init();
		$(document).ready(function(){
			$('.view-m-post').click(function(){
				var hold_id = $(this).val();

				$.ajax({
					type: "GET",
					url: "/post_pub/" + hold_id,
					beforeSend: function (xhr) {
							 var token = $('meta[name="csrf_token"]').attr('content');

							 if (token) {
										 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
							 }
					 },
					 dataType: 'json',
					 success: function(data){
						 $(".post_title").text(data.post_title);
							$(".post_content").empty();
						 $(".post_content").append(data.post_content);
						 $(".post_thumb").attr("src", data.post_thumb);
					 }
				});
			});
		});
	</script>
</head>
<body>
<div id="loading">
	<div class="loadx"></div>
	<div id="loader">
		<h1 class="lightx">CATIA</h1>
		<small>Now Loading</small>
	</div>
</div>
<div id="whole" style="">
	<nav id="home" class="navbar lightx">
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
							<li><a href="/misvi">Mission &amp; Vision</a></li>
							<li><a href="/commi">Commitment</a></li>
							<li><a href="/news">Catia News</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="">Admission<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/registrationpro">Registration Procedure</a></li>
							<li><a href="/join/create">Online Registration</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="">Program<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/training">Training Courses</a></li>
							<li><a href="/facility">Facilities</a></li>
						</ul>
					</li>
					<li><a href="/gallery">Gallery</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>

		@yield('content');

	<section id="contact" class="container-size-flexible container-color-lightblack" style="color:#ffffff; margin-top:-1.7%;">
		<div class="container-fluid img-responsive text-left lightx split-50-top split-50-bottom split-40-side">
			<div class="row">
				<div class="col-lg-5">
					<img src="/images/CATIA_IMAGES/catialogo.png">
					<p class="split-20-top title-text-style">CONTACT US</p>
					{!! Form::open(['route' => 'msg_nt.store', 'enctype' => 'multipart/form-data']) !!}

							<div class="form-group">
			    				{!! Form::label('title', 'Name: '); !!}
			      			{!! Form::text('title',$value = null, $attributes = ['required', 'class' => 'form-control', 'name' => 'title']); !!}
							</div>

							<div class="form-group">
									{!! Form::label('email', 'Email: '); !!}
									{!! Form::text('email',$value = null, $attributes = ['required', 'class' => 'form-control', 'name' => 'email']); !!}
							</div>

			    		<div class="form-group">
									{!! Form::label('msgx', 'Message: '); !!}
			      			{!! Form::textarea('msgx' ,$value = null, $attributes = ['required', 'class' => 'form-control', 'name' => 'msgx']); !!}
							</div>
							 <div class="g-recaptcha" data-sitekey="6LcQzAgUAAAAADsYFOhtOi4qSr7rR6kwWHNORYIF"></div>
							 <button type="submit" class="btn btnstyle">Submit</button>
			  	{!! Form::close() !!}
					{!! Captcha::script() !!}
				</div>

				<div class="col-lg-1"></div>

				<div class="col-lg-3 split-20-top">
					<p class="split-100-top title-text-style">OUR LOCATION</p>
					<i class="fa fa-home"></i>
					<span class="split-5-left">Gate 2, Tesda Complex East<br>
						Service Road, South Superhighway<br>
						Taguig City</span>
				</div>
				<div class="col-lg-3 split-20-top">
					<p class="split-100-top title-text-style">CALL US</p>
					<i class="fa fa-phone split-10-bottom"></i>
					<span class="split-5-left">CATIAFI - 546-5942</span>
					<br>
					<i class="fa fa-mobile split-10-bottom"></i>
					<span class="split-5-left">0915 175 1517 | 0908 216 9471</span>
					<br>
					<i class="fa fa-user text-14-control"></i>
					<span class="split-5-left">Riza | Marvin</span>
				</div>


				<div class="col-lg-1"></div>

				<div class="col-lg-6 split-50-top">
					<p class="split-20-top title-text-style">FOLLOW US</p>
					<div class="col-lg-4">
						<a href=""><i class="fa fa-facebook-f split-10-bottom"></i>
						<span class="split-5-left">Facebook</span></a>
					</div>
					<div class="col-lg-4">
						<a href=""><i class="fa fa-google-plus split-10-bottom"></i>
						<span class="split-5-left">Google</span></a>
					</div>
					<div class="col-lg-4">
						<a href=""><i class="fa fa-twitter"></i>
						<span class="split-5-left">Twitter</span></a>
					</div>
				</div>


				<div class="col-lg-1"></div>

				<div class="col-lg-6">
					<p class="split-80-top"><font style="color:#209eeb;">Catiafi in Partnership with
						<img src=""><a href="http://www.tesda.gov.ph/">Tesda</a></p>

					<p class="split-10-top"><font style="color:#209eeb;">2016 Catia Foundation Inc. All rights reserved. | </font>
						<a href="">Privacy Policy </a></p>
				</div>
			</div>
	</section>
		<!-- Going back to the Top Button -->
		<div class="scroll-up" style="display: none; position: fixed; bottom: 0; right: 0; font-size: 35pt;">
			<a href="#home"><i style="color: #176a96;" class="glyphicon glyphicon-collapse-up"></i></a>
		</div>
</div>
</body>
</html>
