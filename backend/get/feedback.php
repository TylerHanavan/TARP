<?php
$course = $_GET ['course'];
$ta = $_GET ['ta'];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

$database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
$database->connect();
if(!empty($course) && isset($course)) {
  echo json_encode ($database->getFeedback($course));
}
else {
  echo json_encode ($database->getFeedbackByTA($ta));
}
exit();
