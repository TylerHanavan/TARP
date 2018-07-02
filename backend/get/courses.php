<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

  $instructor = $_GET['instructor'];

  if(!isset($instructor) || empty($instructor)) $instructor = -1;

  echo json_encode ($database->getCourses($instructor));
  exit();
