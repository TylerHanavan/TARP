<?php
// Filter input, Format it , Fill database
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $name = $_POST["name"];
  $instructor = $_POST["instructor"];
  $taName = $_POST["taName"];
  
  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();
  $id = $database->addCourse($name,$instructor);
  
  $tas = explode(',', $taName);
  
  for($x = 0; $x < sizeof($tas); $x++) {
	$database->addTA($tas[$x], $id['id']); //make courseID the second paramter here. rn its hard coded as always to CSE331(which is id 1 in db)
  }
  
  //$courseID = get the id of the most recent course created;
  header('Location: ../../frontend/index.html');
  exit();

?>
