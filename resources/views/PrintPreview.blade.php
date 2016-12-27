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
    <span style="position: absolute;"><img src="{{public_path()}}/images/CATIA_IMAGES/smallcatia.png" width="10%"/></span>
    <br />
    <span style="padding-left: 11%;">Republic of the Philippines<br /></span>
    <span style="padding-left: 11%;">CATIA Foundation, Inc.<br /></span>
    <span style="padding-left: 11%;">TTCTCE<br /></span>
    <div style="position: absolute; right: 0; top: 0; border: 2px solid black; width: 55%;">
      <p>
        &nbsp;Serial number<b style="padding-left: 20%;"><?php echo $id;?></b>
      </p>
      <p style="border-top: 2px solid black;">
        &nbsp;TOTAL AMOUNT DUE (CATIA):<b style="padding-left: 10%;"><?php $idx = "PHP " . $remBal; echo $idx;?></b>
      </p>
    </div>
    <div style="padding-top: 2%">
      <h1  style="border-bottom: 2px solid black;">
        LEARNER’S COPY
      </h1>
      <p>
        Full name:  <b style="font-size: 16pt;padding-left: 5%;"><?php echo $man_name;?></b>
      </p>
      <p>
        Training Program:  <b style="font-size: 12pt;padding-left: 5%;"><?php echo $course;?></b>
      </p>
      <p style="border-top: 2px solid black;">
        This is your copy. Keep this copy in safe place. This document is valid until <b>{!! $expire !!}</b>.<br /><br />
        I expressly confirm that the information I have provided to the Training Center are true and correct<br />
        to the best of my knowledge. I agree and understand that I am legally responsible for the information<br />
        I entered in the CATIAFI Online Applicant Registration System and if I violate my enrollment of the<br />
        said training course may be revoked.<br /><br />
        Learner’s Signature: <i style="border: 2px solid black; padding-left:75%; width: 25%; font-size: 24pt;"> </i>
      </p>
    </div>

    <br />
    <div style="border-top: 2px dashed black;" >

    </div>
    <h1 style="position: absolute; top: 47%; left: 40%; background-color: white;">CUT HERE</h1>
    <br />
    <br />
    <span style="position: absolute;"><img src="{{public_path()}}/images/CATIA_IMAGES/smallcatia.png" width="10%"/></span>
    <br />
    <span style="padding-left: 11%;">Republic of the Philippines<br /></span>
    <span style="padding-left: 11%;">CATIA Foundation, Inc.<br /></span>
    <span style="padding-left: 11%;">TTCTCE<br /></span>
    <div style="position: absolute; right: 0; top: 52%; border: 2px solid black; width: 55%;">
      <p>
        &nbsp;Serial number<b style="padding-left: 20%;"><?php echo $id; ?></b>
      </p>
      <p style="border-top: 2px solid black;">
        &nbsp;TOTAL AMOUNT DUE (CATIA):<b style="padding-left: 10%;"><?php $id = "PHP " . $remBal; echo $id;?></b>
      </p>
    </div>
    <div style="padding-top: 2%">
      <h1  style="border-bottom: 2px solid black;">
        CASHIER’S COPY
      </h1>
      <p>
        Full name:  <b style="font-size: 16pt;padding-left: 5%;"><?php echo $man_name;?></b>
      </p>
      <p>
        Training Program:  <b style="font-size: 12pt;padding-left: 5%;"><?php echo $course;?></b>
      </p>
      <p style="border-top: 2px solid black;">
        This is Cashier’s copy. This document is valid until <b>{!! $expire !!}</b>.<br /><br />
        <b style="font-size: 13pt">PAYMENT PROCESS:</b> After printing this document, cut this part and go to<br />
         <b>CATIA Cashier’s Office located at PEVOTI Bldg., TESDA Complex, East Service Rd. So. Superhighway, Taguig City</b> <br />
          and present this voucher together with the payment for <?php echo $course;?><br /><br />
      </p>
    </div>
    <div style="padding-top: 2%">
      <p>
        Full name:  <b style="font-size: 10pt;padding-left: 12.5%;"><?php echo $man_name;?></b>
      </p>
      <p>
        Serial number: <b style="font-size: 10pt;padding-left: 8.5%;"><?php echo $id; ?></b>
      </p>
      <p>
        Training Program:  <b style="font-size: 10pt;padding-left: 5%;"><?php echo $course;?></b>
      </p>
      <p style="text-align: center;">
        <b>TESDA-CATIA Foundation, Inc.</b>
      <p>
      <table style="width:100%">
        <tr>
          <th>Course</th>
          <th>RQR’D HRS</th>
          <th>HRS. / DAY</th>
          <th>DAYS</th>
          <th>SCHED.</th>
          <th>FEE</th>
        </tr>
        <tr>
          <?php
            echo "<td>".$array_course->course."</td>
                  <td>".$array_course->req_hours."</td>
                  <td>".$array_course->hrs_per_day."</td>
                  <td>".$array_course->days."</td>
                  <td>".$array_course->sched."</td>
                  <td>".$array_course->fee."</td>";
          ?>
        </tr>

      </table>

    </p><br />
      <p style="font-size:16pt;">
        <b><?php echo $paymentz ." PAYMENT";?><span style="padding-left: 25%;">:</span><span style="padding-left: 35%;"><?php echo $remBal; ?></span>	</b>
        <br /><br />
        <b>AMOUNT DUE<span style="padding-left: 25%;">:</span><span style="padding-left: 35%;"><?php echo "PHP " . $remBal; ?></span>	</b>
        <br /><br />
        <b>GRAND TOTAL<span style="padding-left: 25%;">:</span><span style="padding-left: 35%;"><?php echo "PHP " . $remBal; ?></span>	</b>
      </p>
      <br />
      <p style="float: left; width: 500px;">
        <b>Documentary Requirements:</b><br />
        1.)	  YP4SC or NCAE Result (Photocopy)<br />
        2.)	Resume / Bio-data<br />
        3.)	2x2 pic (1 pc.) and 1x1 pic (1 pc.)<br />
        4.)	NSO Birth Certificate (Photocopy)<br />
        5.)	Transcript of Record or Copy of Grades (Photocopy)<br />
      </p><br />
      <p style="float: right; width: 250px;">
        <b>Training Fee includes of:</b><br />
        •	Certificate of Training<br />
        •	Use of Tools and Equipment<br />
        •	Learning Materials<br />
      </p>
      <br />
      <p style="padding-top: 10%;">
        <b>Checklist: What to do next?</b><br />
We are providing you this checklist on what to do next. Kindly follow these instructions to complete
your enrollment process.<br /><br />
<span style="border: 2px solid black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;Print this document.<br />
<span style="border: 2px solid black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;Cut the voucher and keep the Learner’s copy.<br />
<span style="border: 2px solid black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;Present the Cashier’s Copy to <b>CATIA Cashier’s Office located at PEVOTI Bldg.,TESDA Complex,  East Service Rd. So. Superhighway, Taguig City</b>\
when you pay the training fee. <br /> <br />
<span style="border: 2px solid black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;After processing your payment, assigned personnel will give you a receipt. Keep them together with<br />
the Learner’s Copy of the Printed Payment Voucher. BEFORE LEAVING THE CASHIER, KINDLY CHECK IF<br />
YOUR NAME AND SERIAL NUMBER ARE CORRECTLY ENCODED. REPORT IMMEDIATELY IF THERE IS AN<br />
ERROR.<br />
IMPORTANT NOTE:  BALANCE MUST BE FULLY PAID ON OR BEFORE START OF CLASSES.<br />

      </p>

    </div>



  </body>
</html>
