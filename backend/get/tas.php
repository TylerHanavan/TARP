<?php
$course = $_GET ['course'];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

$database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
$database->connect();

$data = $database->getTAsForCourse($course);

for($x = 0; $x < sizeof($data); $x++) {
  if($data[$x]['deleted'] == 1) {
    $data[$x]['name'] = $data[$x]['name'] . ' (deleted)';
  }
}

echo json_encode ($data);
exit();
