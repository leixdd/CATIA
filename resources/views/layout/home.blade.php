<!DOCTYPE html>
<html lang="en">
  <head>
      <title>CATIA</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/css/bootstrap.min.css">

  </head>

  <style>
    @font-face {
        font-family: 'lightUI';
        src: url("../fonts/lato-light-webfont.ttf");
    }
    .lightx {
        font-family: lightUI;
    }
    body {
      background-image: url("/images/CATIA_IMAGES/client.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.7);
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      position: relative;
      z-index: 1;
    }
  </style>
  <body>
    <div class="overlay">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

  </body>

  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>


</html>
