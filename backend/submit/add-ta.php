<?php
$course = $_POST['course'];
$taName = $_POST["taName"];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

$database->addTA($taName, $course);
exit();
