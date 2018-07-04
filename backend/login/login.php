<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/session/session.php';

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(!isset($username) || empty($username)) {
    header('Location: ../../frontend/login.html?err=1');
    exit();
  }

  if(!isset($password) || empty($password)) {
    header('Location: ../../frontend/login.html?err=2');
    exit();
  }

  $username = strtolower($username);

  $salt = $database->getUserSaltFromUsername($username);

  $password = hash('sha256', $password . $salt);

  $status = $database->compareUserCredentials($username, $password);

  if(!$status || sizeof($status) == 0) {
    header('Location: ../../frontend/login.html?err=3');
    exit();
  }

  $_SESSION['username'] = $username;

  $_SESSION['user_id'] = $status[0]['id'];

  header('Location: ../../frontend/index.html?');

  exit();

 ?>
