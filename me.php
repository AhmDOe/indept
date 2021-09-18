<html>
<?php
include("array2.php"); ?>
<head>
  <title> Student Report Card </title>
  <h2> Student Report Card </h2>
  <style>
      html {
  font-family:arial;
  font-size: 18px;
}

td {
  border: 1px solid #726E6D;
  padding: 15px;
}

thead{
  font-weight:bold;
  text-align:center;
  background: #625D5D;
  color:white;
}

table {
  border-collapse: collapse;
}

.footer {
  text-align:right;
  font-weight:bold;
}

tbody >tr:nth-child(odd) {
  background: #D1D0CE;
}

  </style>
</head>
<body>
<?php
                                                             $student_data = mysql_query("SELECT * FROM students_info WHERE students_id = 1 ");
                                                             $row = mysql_fetch_array($student_data);
                                                            
                                                            
                                                            ?>
    <span>ID :</span> <?php echo $row['students_ID']?><br>
    <span>Name :</span><?php echo $row['name']?><br>
    <span>Age :</span><?php echo $row['age']?><br>
    <span>Gender :</span><?php echo $row['sex']?><br>
  <table>
    <thead>
      <tr>
        <td colspan="3">Course </td>
        <td rowspan="2"> Class Score </td>
        <td rowspan="2"> Exam </td>
        <td colspan="2"> Grade </td>
      </tr>
      <tr>
        <td>Code </td>
        <td colspan="2"> Name </td>
        <td> Letter </td>
        <td> Points </td>
      </tr>
    </thead>
    
    <tbody>
    <?php
     $get_query = mysql_query("SELECT s.*,i.name,d.subjectname FROM scores_panel s,students_info i,subject d WHERE i.students_id = s.students_id AND s.subjectid = d.subjectid AND i.students_id = 1 ");
      while ($details = mysql_fetch_array($get_query)) {
                                                                   
                                                              
                                                               
        ?>
      <tr>
        <td>CS 225 </td>
        <td colspan="2"><?=$details['subjectname']?> </td>
        <td> <?=$details['2ndCA']?></td>
        <td> <?=$details['exam']?> </td>
        <td> A </td>
        <td> <?=$details['name']?> </td>
      </tr>
      <?php } mysql_free_result($get_query)?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4" class="footer">Total</td>
        <td> 15.0 </td>
        <td colspan="2">55.95 </td>
      </tr>
      <tr>
        <td colspan="4" class="footer">GPA</td>
        <td colspan="3">3.73 / 4.0 </td>
      </tr>
  </table>
</body>
    </html>