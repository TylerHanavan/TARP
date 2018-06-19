<?php
// Filter input, Format it , Fill database
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $name = $_POST["name"];
  $instructor = $_POST['instructor'];
  

  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();
  $database->addCourse($name,$instructor);
  header('Location: ../../frontend/index.html');
  exit();

?>
