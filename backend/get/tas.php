<?php
$course = $_GET ['course'];
$ta = $_GET ['ta'];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

$database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
$database->connect();

$data = $database->getTAsForCourse($course);
$send = array();

if(isset($ta) && !empty($ta)) {
  for($x = 0; $x < sizeof($data); $x++) {
    if($data[$x]['ta'] == $ta) {
      $send[$x] = $data[$x];
    }
  }
}

echo json_encode ($data);
exit();
