<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

  $_SESSION['username'] = null;
  $_SESSION['user_id'] = null;

  session_destroy();

  header('Location: ../../frontend/login.html');
  exit();

 ?>
