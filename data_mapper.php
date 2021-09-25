
<?php

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


// use pdo for db connection
$db_name =  'school';
$db_host = "mysql:dbname=$db_name;host=127.0.0.1";
$db_username = 'root';
$db_password = '';
$db_conn = new PDO($db_host, $db_username, $db_password, $options);


function fetchStudentInfoLargeStmt($connection, $st_id)
{

  try {
    //code...
    $raw_query = sprintf('SELECT s.*,i.name,d.subjectname FROM scores_panel s,students_info i,subject d WHERE i.students_id = s.students_id AND s.subjectid = d.subjectid AND i.students_ID = :st_id');
    $stmt = $connection->prepare($raw_query); # prepare a pdo statement using the query from above
    $stmt->bindParam(':st_id', $st_id); # replace place holder :st_id with actual value
    $stmt->execute(); # execute the query and

    return $stmt; #  return statment instance
  } catch (\Throwable $th) {
    //throw $th;
    print_r($connection->errorInfo()); # output any errors
  }
}



function fetchStudentInfoLightStmt($connection, $st_id)
{
  try {
    //code...
    $raw_query = sprintf('SELECT * FROM students_info WHERE students_id = :st_id'); # sql query with named place holder (:st_id)
    $stmt = $connection->prepare($raw_query); # prepare the query and obtain a pdo::statement instance
    $stmt->bindParam(':st_id', $st_id); # replace placeholder with actual value
    $stmt->execute(); # execute the query and 
    return $stmt; #return the pdo statement instance
  } catch (\Throwable $th) {
    //throw $th;
    print_r($connection->errorInfo());
  }
}

function generateStudentReportMarkup($connection, $st_id)
{
  $student_header_info = fetchStudentInfoLightStmt($connection, $st_id)->fetch();
  $table_data = fetchStudentInfoLargeStmt($connection, $st_id)->fetchAll();

  return generateStudentHeaderHtml($student_header_info) . generateStudentTableHtml($table_data);
}

function generateStudentHeaderHtml($student)
{
  return <<<STUDENT_HEADER
  <div class="row">
  <span>ID :</span> {$student['students_ID']} <br>
  </div>
    <div class="row">
    <span>Age :</span>{$student['age']} <br>
    </div>
    <div class="row">
    <span>Name :</span> <strong>{$student['name']}</strong> <br>
    </div>
    <div class="row">
    <span>Gender :</span>{$student['sex']} <br>
    </div>
STUDENT_HEADER;
}

function generateStudentTableHtml($data)
{

  $rows = generateTableRows($data);
  return <<<STUDENT_TABLE
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
      $rows 
     
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
STUDENT_TABLE;
}

function generateTableRows($details_collection)
{


  $data = array_map(function ($details) {

    return <<<TABLE_ROW
                <tr>
                <td>CS 225 </td>
                <td colspan="2">{$details['subjectname']}</td>
                <td> {$details['2ndCA']}</td>
                <td> {$details['exam']} </td>
                <td> A </td>
                <td> {$details['name']}</td>
            </tr>
TABLE_ROW;
  }, $details_collection);




  return implode('', $data);
}


function generateStudentsReportMarkup($connection)
{
  $student_id_query = 'SELECT students_id FROM students_info';
  $student_ids = $connection->query($student_id_query)->fetchAll(); # execute query directly since no injection is expected;

  $reports_arr = array_map(function ($student_id) use ($connection){
    return generateStudentReportMarkup($connection, $student_id['students_id']);
  }, $student_ids);
  // $student_report = array_map(students_id,generateStudentReportMarkup);
  
  return implode('',$reports_arr);
}
?>
