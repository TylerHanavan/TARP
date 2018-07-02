<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();

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

  $status = $database->compareUserCredentials($username, $password);

  if(!$status || sizeof($status) == 0) {
    header('Location: ../../frontend/login.html?err=3');
    exit();
  }

  $_SESSION['username'] = $username;

  exit();

 ?>
