<?php
$course = $_POST['course'];

include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

if (!$logged_in) {
  header('Location: ../../frontend/course.html?course=' . $course);
  exit();
}

$b = false;
$courses = $database->getCourses($user_id);
for($x = 0; $x < sizeof($courses); $x++)
  if($courses[$x]['id'] == $id)
    $b = true;
if(!$b) {
  header('Location: ../../frontend/course.html?course=' . $course);
  exit();
}

$database->removeCourse($course);
header("Location: ../../frontend/index.html");
exit();
