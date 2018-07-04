<?php
$name = $_POST['course'];
$id = $_POST["courseId"];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';
if (!$logged_in) {
  header('Location: ../../frontend/course.html?course=' . $id);
  exit();
}
$b = false;
$courses = $database->getCourses($user_id);
for($x = 0; $x < sizeof($courses); $x++)
  if($courses[$x]['id'] == $id)
    $b = true;
if(!$b) {
  header('Location: ../../frontend/course.html?course=' . $id);
  exit();
}
$database->changeCourseName($id, $name);
header('Location: ../../frontend/course.html?course=' . $id);
exit();
