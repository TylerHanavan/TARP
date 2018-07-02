<?php

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

  $data = array();

  if(!$logged_in) {
    $data['status'] = 'no session';
  } else {
    $data['username'] = $username;
    $data['user_id'] = $user_id;
  }


  echo json_encode($data);
  exit();

 ?>
