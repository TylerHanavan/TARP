<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/session.php';

  echo json_encode ($database->getCourses());
  exit();
