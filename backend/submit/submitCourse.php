<?php
// Filter input, Format it , Fill database
  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';
  if (!$logged_in) {
    header('Location: ../../frontend/index.html');
    exit();
  }

  $name = $_POST["name"];
  $taName = $_POST["taName"];

  $id = $database->addCourse($name, $_SESSION['user_id']);

  $tas = explode(',', $taName);

  for($x = 0; $x < sizeof($tas); $x++)
    if($tas[$x] != '' && isset($tas[$x]) && !empty($tas[$x]) && $tas[$x] != null)
	     $database->addTA($tas[$x], $id['id']); //make courseID the second paramter here. rn its hard coded as always to CSE331(which is id 1 in db)

  //$courseID = get the id of the most recent course created;
  header('Location: ../../frontend/index.html');
  exit();

?>
