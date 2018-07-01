<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(!isset($username) || empty($username)) {
    header('Location: index.html?err=1');
    exit();
  }

  if(!isset($password) || empty($password)) {
    header('Location: index.html?err=2');
    exit();
  }

  $username = strtolower($username);

  if(!$database->compareUserCredentials($username, $password)) {
    header('Location: index.html?err=3');
    exit();
  }

  exit();

 ?>
