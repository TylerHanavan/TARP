<?php
$course = $_POST['course'];
$id = $_POST["id"];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

$database->removeTA($id, $course);
exit();
