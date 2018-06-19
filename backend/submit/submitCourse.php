<?php
// Filter input, Format it , Fill database
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $name = $_POST["name"];
  $instructor = $_POST["instructor"];
  $taName = $_POST["taName"];
  
  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();
  $database->addCourse($name,$instructor);
  
  //$courseID = get the id of the most recent course created;
  $database->addTA($taName, 1); //make courseID the second paramter here. rn its hard coded as always to CSE331(which is id 1 in db)
  header('Location: ../../frontend/index.html');
  exit();

?>
