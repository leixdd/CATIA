<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
     -->
    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/glyphicons.pro.css">

    <script src="/js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#tog-down23").click(function(){
                $("#panel-down23").slideToggle("fast");
                $("#tog-down23").toggleClass("active");
            });

            $('.view-m-post').click(function(){
              var hold_id = $(this).val();

              $.ajax({
                type: "GET",
                url: "/newsfeed/" + hold_id,
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
            background-color: #555;
            color: #ffffff;
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


        #panel-down23{
            padding: 5px;
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
                    <li><a href="{{ url('/') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li id="panel-dow">
                        <a href="{{ url('/O_portal') }}"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Logout</a>
                    </li>
                    <li><a href="/students"><span class="glyphpro glyphpro-dashboard">&nbsp;</span>Newsfeed</a></li>
                    <li><a href="/students/{{$id_set}}"><span class="glyphicon glyphicon-comment" style="color: green;">&nbsp;</span>Account</a></li>
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
                    <li><a href="{{ url('/portal') }}">You're not logged in</a></li>
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
            <h4 class="text-center" style="margin-bottom: 25%;"><a style="color :  #ffffff; text-decoration: none;"  href="{{ url('/') }}">Catia Foundation Inc.</a></h4>
          <ul class="nav nav-pills nav-stacked">
            <li>
                <a id="tog-down23" href="#">
                    <span class="glyphicon glyphicon-user">&nbsp;</span>@yield('username')<span class="caret"></span>
                </a>
            </li>
            <li id="panel-down23">
                <a href="{{ url('/O_portal') }}"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Logout</a>
            </li>
            <li><a href="/students"><span class="glyphpro glyphpro-dashboard">&nbsp;</span>Newsfeed</a></li>
            <li><a href="/ann"><span class="glyphpro glyphpro-nameplate_alt">&nbsp;</span>Announcements</a></li>
            <li><a href="/students/{{$id_set}}"><span class="glyphicon glyphicon-comment" style="color: green;">&nbsp;</span>Account</a></li>
          </ul><br>
      </div>
        <br />
        <div class="col-sm-10">
            @yield('content')
        </div>
      </div>

    </div>





    <!-- JavaScripts -->
    <script src="/js/bootstrap.min.js" ></script>
    <script src="/js/execAjax.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
