<?php
// Filter input, Format it , Fill database
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $course = $_POST["course"];
  $ta = $_POST['ta'];
  $taDescription = $_POST["taDescription"];
  $comments = $_POST["comments"];
  $overallExperience = $_POST["overallExperience"];
  $importance = $_POST["importance"];
  $name = $_POST["name"];
  $contactInfo = $_POST["contactInfo"];

  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();
  $database->addFeedback($course,$ta,$taDescription,$comments,$name);
  exit();

?>
