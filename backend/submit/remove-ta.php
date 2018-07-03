<?php
$course = $_POST['course'];
$id = $_POST["id"];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';
if (!$logged_in) {
  echo 'not logged in';
  exit();
}
$b = false;
$courses = $database->getCourses($user_id);
for($x = 0; $x < sizeof($courses); $x++)
  if($courses[$x]['id'] == $course)
    $b = true;
if(!$b) {
  echo 'not a course you own';
  exit();
}
$database->removeTA($id, $course);
echo 'success';
exit();
