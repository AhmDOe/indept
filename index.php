<html>
<?php
include("data_mapper.php"); ?>

<head>
  <title> Student Report Card </title>
  <h2> Student Report Card </h2>
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
    echo generateStudentReportMarkup(
      fetchStudentInfoLightStmt($db_conn, $_GET['student_id'])->fetch(),
      fetchStudentInfoLargeStmt($db_conn, $_GET['student_id'])->fetchAll()
    );
  } else if (isset($_GET['GET_REPORT_ALL'])) {
    echo generateStudentsReportMarkup($db_conn);
  }
  ?>


</body>

</html>