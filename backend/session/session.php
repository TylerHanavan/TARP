<?php

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  $database = new Database($CREDENTIALS["address"],$CREDENTIALS["database"], $CREDENTIALS["username"], $CREDENTIALS["password"]);
  $database->connect();

  $logged_in = false;

  session_start();

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

 ?>
