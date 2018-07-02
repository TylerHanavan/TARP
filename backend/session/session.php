<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();

  $logged_in = false;
  $debug = false;

  session_start();

  if($debug) var_dump(session_id());

  function getRandStr($size = 7, $caps_only = false) {
    $p = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    if($caps_only)
      $p = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $r = '';
    for($x = 0; $x < $size; $x++) {
      $r .= $p[rand(0, strlen($p))];
    }
    return $r;
  }

  if(isset($_COOKIE['sess']) && !empty($_COOKIE['sess'])) {
    $cook = $_COOKIE['sess'];
  }

  if(isset($cook) && !empty($cook)) {
    if($debug) echo 'Sess was already set: ', $cook;
  } else {
    $cook = getRandStr();
    setcookie('sess', $cook, time() + 24 * 60 * 60 * 3, '/');
    if($debug) echo 'Session was not set: ', $cook;
  }

  if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $logged_in = true;
    $username = $_SESSION['username'];
  }

 ?>
