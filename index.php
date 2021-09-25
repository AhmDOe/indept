<html>
<?php
include("data_mapper.php"); ?>

<head>
  <title> Student Report Card </title>
  <h2> Student Report Card </h2>
  <style>
    body{
      width: 70%;
      display:flex;
      flex-direction: column;
      margin-left: auto;
      margin-right: auto;
      
    }
    html {
      width:100%;
      font-family: arial;
      font-size: 18px;

    }

    td {
      border: 1px solid #726E6D;
      padding: 15px;
    }

    thead {
      font-weight: bold;
      text-align: center;
      background: #625D5D;
      color: white;
    }

    table {
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .footer {
      text-align: right;
      font-weight: bold;
    }

    tbody>tr:nth-child(odd) {
      background: #D1D0CE;
    }

    .report_form {
      display: inline-block;
    }
  </style>
</head>

<body>

  <div class="row">
    <form method="get" class="report_form">
      <label for="student_id">Student ID</label>
      <input id="student_id" required name='student_id' type="number">
      <button type="submit" name="GET_REPORT_ONE" value='true'>Get Report</button>
    </form>

    <form action="" method="get" class="report_form">
      <button name="GET_REPORT_ALL">Get All Reports</button>
    </form>
    <form action="" method="get" class="report_form">
      <button>Clear</button>
    </form>
  </div>
  <?php

  if (isset($_GET['GET_REPORT_ONE'])) {
    echo generateStudentReportMarkup($db_conn, $_GET['student_id']);
  } else if (isset($_GET['GET_REPORT_ALL'])) {
    echo generateStudentsReportMarkup($db_conn);
  }
  ?>


</body>

</html>