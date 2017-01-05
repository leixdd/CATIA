<html>
  <head>
    <title>Catia Foundation</title>
  	<meta charset="utf-8">

    <style>
      body{
        font-family: sans-serif;
      }
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td {
          padding: 5px;
      }
      tr{
        text-align: center;
      }
    </style>
  </head>

  <body>
    <h4 style="color: #3385ff;" align="center">TESDA</h4>
    <p style="color: #3385ff; position: absolute; top: 5%; left: 25%;">Technical Educational and Skills Development Authority</p>
    <h6 style="margin-top:5%;" align="center">Award this</h6>
    <div style="margin-top: 1%;">
      <h1 align="center" style="color: #3385ff; font-size: 38pt;">Certificate of Training</h1>
    </div>
    <h6 style="margin-top:2%;" align="center">to</h6>
    <div style="margin-top: 2%; border-bottom: 2px solid black;">
      <h1 align="center">{{ $last }},&nbsp;{{ $first }}&nbsp;{{ $middle }}</h1>
    </div>
    <h6 style="margin-top:2%;" align="center">For having successfully completed the training on</h6>
    <div style="margin-top: 1%;">
      <h1 align="center" style="color: #3385ff; ">{{ $course }}</h2>
      <h2 align="center" style="color: #3385ff;">{{ $hours }}</h2>
    </div>    
     <h5 style="margin-top:1%;" align="center">Given this {{ $date }} at</h5>
     <h5 style="margin-top:1%;" align="center">Gate 2, Tesda Complex East Service Road, South Superhighway Taguig City.</h5>
  </body>
</html>
