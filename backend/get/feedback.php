<?php
$course = $_GET ['course'];
$ta = $_GET ['ta'];
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

$database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
$database->connect();
$feedback = array();
if(!empty($course) && isset($course)) {
  $feedback = $database->getFeedback($course);
}
else {
  $feedback = $database->getFeedbackByTA($ta);
}
for($x = 0; $x < sizeof($feedback); $x++) {

  $feedback[$x]['comments'] = htmlspecialchars($feedback[$x]['comments']);

	$feedback[$x]['taName'] = $database->translateTA($feedback[$x]['ta']);

}
echo json_encode($feedback);
exit();
