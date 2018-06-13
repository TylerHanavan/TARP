<?php
// Filter input, Format it , Fill database
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $course = $_POST["course"];
  $ta = $_POST['ta'];
  $taDescription = $_POST["taDescription"];
  $comments = $_POST["comments"];
  $overallExperience = $_POST["overallExperience"];
  $overallComm = $_POST['overallComm'];
  $importance = $_POST["feedbackPriority"];
  $name = $_POST["name"];
  $email = $_POST["email"];

  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();
  $database->addFeedback($course,$ta,$taDescription,$comments,$name, $overallExperience, $importance, $overallComm, $email);
  exit();

?>
