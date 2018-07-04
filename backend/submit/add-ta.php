<?php
$course = $_POST['course'];
$taName = $_POST["taName"];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

if (!$logged_in) {
  header('Location: ../../frontend/course.html?course=' . $id);
  exit();
}

$database->addTA($taName, $course);
exit();
