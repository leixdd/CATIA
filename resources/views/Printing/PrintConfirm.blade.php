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
    <h4 style="color: #3385ff;" align="center">Technical Education and Skills Development Authority</h4>
    <p style="color: #3385ff; position: absolute; top: 5%; left: 15%;">Pangasiwaan sa Edukasyong Teknikal at Pagpapaunlad ng Kasanayan</p>
    <div style="border-top: 3px solid black; margin-top: 2%;">
      <h1 align="center">Registration Form</h1>
    </div>
    <h4 align="center" style="color: #3385ff; margin-top: -5%;">LEARNERS PROFILE FORM</h4>
    <h3 style="color: #3385ff; margin-top: 5%;">1. Web-Based Information System Auto Generated</h3>
    <ul style="list-style-type:none">
      <li>
        <b>1.1 Unique Learner Identifier (ULI) Number:</b>&nbsp;{{ $serial }}
      </li>
      <li>
        <b>1.2 Entry Date:</b>&nbsp;{{ $entry_date }}
      </li>
    </ul>
    <h3 style="color: #3385ff; margin-top: 1%;">2. Manpower Profile</h3>
    <ul style="list-style-type:none">
      <li>
        <b>2.1 Name:</b>
        <ul style="margin-top: 2%; margin-bottom: 2%;">
          <li style="display:inline; padding-right: 5%;">
            Last:&nbsp;{{ $last }}
          </li>
          <li style="display:inline; padding-right: 5%;">
            First:&nbsp;{{ $first }}
          </li>
          <li style="display:inline;">
            Middle:&nbsp;{{ $middle}}
          </li>
        </ul>
      </li>
      <li>
        <b>2.2 Complete Permanent Mailing Address:</b>
        <ul style="margin-top: 2%; margin-bottom: 2%; font-size: 10pt;">
          <li style="display:inline; padding-right: 5%;">
            Number, Street:&nbsp;{{ $num_street }}
          </li>
          <li style="display:inline; padding-right: 5%;">
            Barangay:&nbsp;{{ $barangay }}
          </li>
          <li style="display:inline;">
            District:&nbsp;{{ $district }}
          </li>
        </ul>
        <ul style="margin-top: 2%; margin-bottom: 2%; font-size: 10pt;">
          <li style="display:inline; padding-right: 5%;">
            City/Municipality:&nbsp;{{ $city }}
          </li>
          <li style="display:inline; padding-right: 5%;">
            Province:&nbsp;{{ $province }}
          </li>
          <li style="display:inline;">
            Region:&nbsp;{{ $region }}
          </li>
        </ul>
        <ul style="margin-top: 2%; margin-bottom: 2%; font-size: 10pt;">
          <li style="display:inline; padding-right: 5%;">
          Email Address:&nbsp;{{ $email }}
          </li>
          <li style="display:inline; padding-right: 5%;">
            Contact No:&nbsp;{{ $contact }}
          </li>
          <li style="display:inline;">
            Nationality:&nbsp;{{ $nationality }}
          </li>
        </ul>
      </li>
    </ul>
    <h3 style="color: #3385ff; margin-top: 1%;">3. Personal Information</h3>
    <ul style="list-style-type:none">
      <li>
        <b>3.1 Sex:</b>&nbsp;{{ $sex }}
      </li>
      <li style="margin-top: 1%;">
        <b>3.2 Civil Status:</b>&nbsp;{{ $cv }}
      </li>
      <li style="margin-top: 1%;">
        <b>3.3 Employment Status(before the training): </b>&nbsp;{{ $emp }}
      </li>
      <li style="margin-top: 1%;">
        <b>3.4 Birthdate:</b>&nbsp;{{ $bdm }}&nbsp;{{ $bdd }},&nbsp;{{ $bdy }}
      </li>
      <li style="margin-top: 1%;">
        <b>3.4 Birthplace:</b>&nbsp;{{ $bp }}
      </li>
      <li style="margin-top: 1%;">
        <b>3.5 Educational Attainment Before the Training(Trainee): </b>&nbsp;{{ $educ }}
      </li>
    </ul>
    <h3 style="color: #3385ff; margin-top: 1%;">4. Learner/Trainee/Student(Clients)</h3>
    <ul style="list-style-type:none">
      <li>
        <b>Classification:</b>&nbsp;{{ $class }}
      </li>
    </ul>
    <h3 style="color: #3385ff; margin-top: 1%;">5. Taken NCAE/YP4SC Before?</h3>
    <ul style="list-style-type:none">
      <li style="display:inline; padding-right: 5%;">
        <b>_Yes</b>
      </li>
      <li style="display:inline; padding-right: 5%;">
        <b>_No</b>
      </li>
      <li style="padding-top: 10%;">
        <b>When:__________________</b>
      </li>
      <li style="padding-top: 10%;">
        <b>Where:__________________</b>
      </li>
    </ul>
    <h3 style="color: #3385ff; margin-top: 1%;">6.  Name of Course/Qualification</h3>
    <ul style="list-style-type:none">
      <li style="margin-top: -3%;">
        <h2>{{ $course }}</h2>
      </li>
    </ul>
    <h3 style="color: #3385ff; margin-top: 1%;">7.  Applicant’s Signature</h3>
    <p align="center" style="margin-bottom: 5%;">
    <i style="font-size: 8pt;">This is to certify that the information stated above is  true and correct.</i>
    </p>
    <ul style="list-style-type:none ">
      <li style="display:inline; padding-left: 10%;padding-right: 20%; ">
        <b style="padding-left: 7%; border-top: 2px solid black">Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
      </li>
      <li style="display:inline;">
        <b style="padding-left: 7%; border-top: 2px solid black;">Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
      </li>
    </ul>
    <h3 style="color: #3385ff; margin-top: 1%;">7. Student/Scholar Voucher Number(For Scholar only)</h3>
    <ul style="list-style-type:none">
      <li style="">
        <b>Voucher Number :   ___________________________________</b>
      </li>
      <li style="padding-top: 2%;">
        <b>Scholarship Package (TWSP,  PESFA, etc.) :   ___________________________________</b>
      </li>
      <li style="padding-top: 2%;">
        <b>Name of Course/Qualification :   ___________________________________</b>
      </li>
    </ul>
    <p align="center" style="margin-top: 10%; margin-bottom: 5%;">
    <i style="font-size: 8pt;">This is to certify that the information stated above is  true and correct.</i>
    </p>
    <ul style="list-style-type:none ">
      <li style="display:inline;padding-right: 20%; ">
        <b style="padding-left: 7%; border-top: 2px solid black">SIGNATURE OVER PRINTED NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
      </li>
      <li style="display:inline;">
        <b style="padding-left: 7%; border-top: 2px solid black;">Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
      </li>
    </ul>
  </body>
</html>
