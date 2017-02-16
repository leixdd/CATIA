<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <title>CATIA</title>

    <!-- Fonts
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
     -->
    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/glyphicons.pro.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">
    <link href="/summernote/dist/summernote.css" rel="stylesheet">



    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jspdf.min.js"></script>
    <script src="/summernote/dist/summernote.js"></script>
    <style>


        .fa-btn {
            margin-right: 6px;
        }

        @font-face {
            font-family: 'lightUI';
            src: url("/fonts/lato-light-webfont.ttf");
        }

        .lightx {
            font-family: lightUI;
        }


        body {
            font-family: 'lightUI';
            margin: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 100%}

        /* Set gray background color and 100% height */
        .sidena{
          background-color: #333333;
          margin: 0;
          color: #ffffff;
          height: 100%;

        }

        .sidenav{
          background-color: #333333;
          margin: 0;
          color: #ffffff;
          position: fixed;
          z-index: 1;
          height: 100%;
          overflow: auto;
        }

        .sidenav li a:visited {
          background-color:  #209eeb;
          color: white;
        }
        .sidenav li a{
          color: #ffffff;
          display: block;
          text-decoration: none;
        }

        .sidenav li a.active {
            background-color:  #209eeb;
            color: white;
        }

        .sidenav li a:hover:not(.active) {
            background-color: #555;
            color: #ffffff;
        }


        #mainpane-down{
            padding: 2px;
            display: none;
            /*background-color:#404040;*/
            width: 100%;
        }


        #cmspane-down, #panel-down{
            padding: 2px;
            display: none;
            background-color:#404040;
            width: 100%;
        }




        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
          .row.content {height: auto;}
        }

    </style>
</head>


<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top visible-xs">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Catia Foundation Inc.
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">You're not logged in</a></li>
                    @else

                    <li id="panel-dow">
                        <a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Logout</a>
                        <a href="/list_pending"><span class="glyphicon glyphicon-cog">&nbsp;</span>Settings</a>
                    </li>
                    <li><a href="/adminpanel"><span class="glyphpro glyphpro-dashboard">&nbsp;</span>Dashboard</a></li>
                    <li><a href="/list_pending"><span class="glyphpro glyphpro-nameplate">&nbsp;</span>Pending Applicants</a></li>
                    <li><a href="/list_confirm"><span class="glyphpro glyphpro-nameplate_alt">&nbsp;</span>Confirm Applicants</a></li>
                    <li><a href="/newAdmin"><span class="glyphpro glyphpro-user_add" style="color: #209eeb;">&nbsp;</span>New Admin Account</a></li>
                    <li><a href="/msg_nt"><span class="glyphicon glyphicon-comment" style="color: green;">&nbsp;</span>Messages</a></li>
                    <li><a href="{{ route('post.create')}}"><span class="glyphicon glyphicon-heart" style="color: red;">&nbsp;</span>CMS</a></li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <!-- just a dummy but do not delete this -->
          <div class="col-sm-2 sidena hidden-xs">
              <h1><img src="/images/CATIA_IMAGES/Catia_Logo.png" class="" width="20%;"><a style="color :  #5e5ce1; text-decoration: none;" href="{{ url('/login') }}">Catia</a></h1>
            <ul class="nav nav-pills nav-stacked">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">You're not logged in</a></li>
                @else

                    <li><a class="active" href="/home"><span class="glyphpro glyphpro-dashboard">&nbsp;</span>Dashboard</a></li>
                    <li><a href="/list_pending"><span class="glyphpro glyphpro-nameplate">&nbsp;</span>Pending Applicants</a></li>
                    <li><a href="/list_pending"><span class="glyphpro glyphpro-nameplate_alt">&nbsp;</span>Confirm Applicants</a></li>
                @endif
            </ul><br>
        </div>
        <!-- The real one -->
        <div class="col-sm-2 sidenav hidden-xs">
            <img src="/images/CATIA_IMAGES/Catia_Logo.png"  width="50%;" style="margin-top: 15px; margin-left: 25%; margin-right:auto;">
            <h4 class="text-center" style="margin-bottom: 25%;"><a style="color :  #ffffff; text-decoration: none;"  href="{{ url('/login') }}">Catia Foundation Inc.</a></h4>
          <ul class="nav nav-pills nav-stacked">
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">You're not logged in</a></li>
              @else
              <!-- user -->
                  <li>
                      <a class="" id="tog-down" href="#">
                          <span class="glyphicon glyphicon-user">&nbsp;</span>{{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                  </li>
                  <li id="panel-down">
                      <a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Logout</a>
                  </li>


                  <li><a href="/adminpanel"><span class="glyphpro glyphpro-dashboard">&nbsp;</span>Dashboard</a></li>

                  <!-- applicants -->
                  <li><a href="/getCourses"><span class="glyphpro glyphpro-nameplate_alt" style="color: yellow;">&nbsp;</span>Applicants</a></li>

                  <li><a href="/newAdmin"><span class="glyphpro glyphpro-user_add" style="color: #209eeb;">&nbsp;</span>New Admin Account</a></li>
                  <li><a href="/msg_nt"><span class="glyphicon glyphicon-comment" style="color: green;">&nbsp;</span>Messages</a></li>
                  <li>
                    <a href="#" id="cms-down">
                      <span class="glyphicon glyphicon-heart" style="color: red;">&nbsp;</span>CMS <span class="caret"></span>
                    </a>
                  </li>
                  <li id="cmspane-down">
                      <center>&nbsp;</center>
                      <center><span class="label label-primary">Courses</span></center>
                      <center>&nbsp;</center>
                      <a href="{{ url('/course') }}"><span class="glyphicon glyphicon-book">&nbsp;</span>Courses</a>
                      <a href="{{ route('course.create')}}"><span class="glyphicon glyphicon-leaf">&nbsp;</span>New Course</a>
                      <center>&nbsp;</center>
                      <center><span class="label label-success">Post</span></center>
                      <center>&nbsp;</center>
                      <a href="{{ url('/post') }}"><span class="glyphicon glyphicon-paperclip">&nbsp;</span>Post</a>
                      <a href="{{ route('post.create')}}"><span class="glyphicon glyphicon-file">&nbsp;</span>New Post</a>
                  </li>

              @endif
          </ul><br>
      </div>
        <br />
        <div class="col-sm-10">

            @yield('content')

        </div>
      </div>

    </div>





      <!-- JavaScripts -->
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/execAjax.js"></script>
      {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    </body>
  </html>
