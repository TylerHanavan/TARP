<?php
$course = $_POST['course'];

include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

if (!$logged_in) {
  header('Location: ../../frontend/course.html?course=' . $id);
  exit();
}

$database->removeCourse($course);
header("Location: ../../frontend/index.html");
exit();
