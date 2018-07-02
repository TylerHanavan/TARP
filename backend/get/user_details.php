<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

  $data = array();

  $data['username'] = $_SESSION['username'];
  $data['user_id'] = $_SESSION['user_id'];

  echo json_encode($data);

  exit();

 ?>
