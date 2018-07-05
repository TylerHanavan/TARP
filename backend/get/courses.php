<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

  $instructor = $_GET['instructor'];

  $set = $_GET['set'];

  if(strcmp($set, 'self') == 0) $instructor = $_SESSION['user_id'];

  if(!isset($instructor) || empty($instructor)) $instructor = -1;
  if(!isset($set) || empty($set)) $set = 'all';

  echo json_encode ($database->getCourses($instructor));
  exit();
