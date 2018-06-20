<?php
$course = $_GET ['course'];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

$database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
$database->connect();

echo json_encode ($database->getFeedback($course));
exit();
