@extends('layout.lay-e')

@section('content')
<style>
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
		width: 70%;
		margin: auto;
}
</style>
<section id="home" class="container-size-flexible container-color-white"> <!-- HOME Section-->
	<div class="container-fluid">
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
				  <div class="item active">
				  	<img class="img-responsive" style="width:100%;" src="/images/CATIA_IMAGES/banner1.jpg">
				  </div>
				  <div class="item">
				   <img class="img-responsive" style="width:100%;" src="/images/CATIA_IMAGES/banner2.jpg">
				  </div>
				  <div class="item">
				    <img class="img-responsive" style="width:100%;" src="/images/CATIA_IMAGES/banner3.jpg">
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</section><!-- End Section -->


<section class="container-size-flexible container-color-darkwhite split-150-top split-150-bottom"><!-- ABOUT Section-->
	<div class="container-fluid text-center lightx">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				 <div class="wow fadeInUp">
					<h1 class="header-text-style"><font class="line-text-style">|</font>Welcome Applicants!</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="wow fadeInDown split-40-top">
					<p class="text-14-control">Catia Foundation is non-profit organization dedicated in developing the country’s industry workforce that caters to training along information communication technology, mechanical, electronics, and electrical. Catiafi was born to truly become a responsive non-government organization by creating various strategies of reaching the underserved Filipinos with better employment thru the competence along advanced technologies.</p>
				</div>
			</div>
		</div>
		<div class="row split-50-top text-50-control">
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow fadeInLeft">
				<a style="color:#333333;" href="/misvi"><span class="glyphicon glyphicon-flag"></span></a>
				<p class="text-18-control">Mission</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow fadeIn">
				<a style="color:#333333;" href="/misvi"><span class="glyphicon glyphicon-eye-open"></span></a>
				<p class="text-18-control">Vision</p>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow fadeInRight">
				<a style="color:#333333;" href="/commi"><span class="glyphicon glyphicon-lock"></span></a>
				<p class="text-18-control">Commitment</p>
			</div>
			 <div class="col-lg-2 col-md-2 col-sm-2">
			</div>
		</div>
	</div>
</section> <!-- End Section -->


<section class="container-size-flexible container-color-white"> <!-- COURSE INTRO Section-->
	<div class="container-fluid">
		<div class="row split-80-top split-80-bottom lightx">
			<div class="col-lg-6">
				<div class="embed-responsive embed-responsive-16by9 wow bounceIn">
					<iframe class="embed-responsive-item" width="854" height="480" src="https://www.youtube.com/embed/nyHz4jJh4Zs" frameborder="0" allowfullscreen>
					</iframe>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="text-center text-14-control">
					<h1 class="header-text-style wow tada split-20-bottom"><font class="line-text-style">|</font>Start your IT training with us!</h1>
					<p class="wow fadeInUp split-10-bottom">Promote advanced technology to increase productivity in the industry and improve quality of goods and services for global marketability; </p>
					<p class="wow fadeIn split-10-bottom">Enhance skills and knowledge of workers  to make them globally competitive</p>
					<p class="wow fadeInDown split-20-bottom">Undertake projects and activities that will carryout its objectives.</p>
					
					<a href="/training"><button class="btn btnstyle">Learn More</button></a>
				</div>
			</div>
		</div>
	</div>
</section> <!-- END Section-->


<section class="container-size-flexible container-color-white lightx">	<!-- NEWS Section-->
	<div class="container-fluid container-color-blue split-50-top split-50-bottom split-50-left">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<img class="img-responsive news-icon" src="/images/CATIA_IMAGES/newsicon.png">
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="text-left wow fadeInUp split-10-side split-50-top">
					<h1 class="header-text-style" style="color:#ffffff;"><font class="line-text-style" style="color:#176a96;">|</font>What's happening in Catia?</h1>
					<p><a href="/news" style="color: #176a96;width:65px;">Click here</a>for more Catia News.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row text-center split-50-top">
			@foreach ($lst as $key)
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow fadeIn">
					<img class="img-responsive center-block" src="{{ $key->post_thumb }}">
					<h1 class="title-text-style split-10-top">{{ $key->post_title }}</h1>
					<?php  $str = str_limit($key->post_content, 500)?>
					<p class="split-10-bottom" id="setx">{!! html_entity_decode($str)!!}</p>
					<button class="btn btnstyle"></button>
				</div>
			@endforeach
		</div>
		<div class="text-center split-50-bottom">
			<a href="/post_pub"><button class="btn btnstyle">View all News</button></a>
		</div>
	</div>
</section>	<!-- End Section -->


<section class="container-size-flexible container-color-blue split-80-top split-150-bottom"> <!-- TESTIMONIALS Section-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center wow fadeInUp lightx split-80-bottom">
					<h1 class="header-text-style" style="color:#ffffff;"><font class="line-text-style" style="color:#176a96;">|</font>Testimonials</h1>
				</div>
			</div>
		</div>
		<div class="row lightx text-center wow fadeInDown" style="color:#ffffff; ">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<img class="img-responsive center-block testimonial-pic" src="/images/CATIA_IMAGES/female.png">
				<p class="split-40-top">"Ipsum dolor sit amet, consectetur sed do eiusmod tempor adipiscing elit, sed do eiusmod tempor dolore magna  ut labore incididunt ut labore et dolore magna Ut enim ad minim veniam aliqua. Ut enim ad minim veniam, quis Ut enim ad minim."<br>
					-Lorep</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<img class="img-responsive center-block testimonial-pic" src="/images/CATIA_IMAGES/male.png">
				<p class="split-40-top">"Ipsum dolor sit amet, consectetur sed do eiusmod tempor adipiscing elit, sed do eiusmod tempor dolore magna  ut labore incididunt ut labore et dolore magna Ut enim ad minim veniam aliqua. Ut enim ad minim veniam, quis Ut enim ad minim."<br>
					-Lorep</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<img class="img-responsive center-block testimonial-pic" src="/images/CATIA_IMAGES/female.png">
				<p class="split-40-top">"Ipsum dolor sit amet, consectetur sed do eiusmod tempor adipiscing elit, sed do eiusmod tempor dolore magna  ut labore incididunt ut labore et dolore magna Ut enim ad minim veniam aliqua. Ut enim ad minim veniam, quis Ut enim ad minim."<br>
					-Lorep</p>
			</div>
		</div>
	</div>
</section>	<!-- End Section -->


<section class="container-size-flexible container-color-gray">	<!-- MAP Section-->
	<div class="container-fluid">
		<div class="row>">
			<div class="col-lg-12">
				<div class="embed-responsive embed-responsive-16by9 center-block">
					<iframe class="embed-responsive-item split-10-bottom" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.6360420810793!2d121.03865131483913!3d14.505570989863054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf2447d44979%3A0x392df21ecf7961c4!2sTesda+Call+Center+Training+Accredited+School!5e0!3m2!1sen!2sph!4v1473002622980"
									height="530"
									frameborder="0"
									style="border:0;width:100%;"
									allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection
