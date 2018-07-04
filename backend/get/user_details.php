<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

  $data = array();

  if(!$logged_in) {
    $data['status'] = 'no session';
  } else {
    $data['username'] = $username;
    $data['user_id'] = $user_id;
    $courses = $database->getCourses($user_id);
    $course_string = '';
    for($x = 0; $x < sizeof($courses); $x++) {
      $course_string .= $courses[$x]['id'] . ',';
    }
    $data['courses'] = $course_string;
  }


  echo json_encode($data);
  exit();

 ?>
