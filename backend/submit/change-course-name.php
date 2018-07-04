<?php
$name = $_POST['name'];
$id = $_POST["id"];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';
if (!$logged_in) {
  header('Location: ../../frontend/course.html?course=' . $course);
  exit();
}
$b = false;
$courses = $database->getCourses($user_id);
for($x = 0; $x < sizeof($courses); $x++)
  if($courses[$x]['id'] == $course)
    $b = true;
if(!$b) {
  header('Location: ../../frontend/course.html?course=' . $course);
  exit();
}
$database->changeCourseName($id, $name);
exit();
