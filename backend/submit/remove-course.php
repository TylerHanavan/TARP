<?php
$course = $_POST['course'];

include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

$database->removeCourse($course);
header("Location: ../../frontend/index.html");
exit();
