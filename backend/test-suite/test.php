<?php

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';

  try {

    /* Begin Unit Testing Here */

    $database = new Database('localhost', 'database', 'username', 'password');

    assertStringEquals($database->address, 'localhost');
    assertStringEquals($database->database, 'database');
    assertStringEquals($database->username, 'username');
    assertStringEquals($database->password, 'password');

    /* End Unit Testing Here */
    /* DO NOT ADD UNIT TESTS BEYOND THIS COMMENT */

  } catch(Exception $e) {
    echo '<b>An exception occurred during testing!</b>';
    exit();
  }

  echo 'All test cases passed. Congratulations.';

  function assertTrue($case, $message = 'A case was false!') {
    if(!$case) {
      echo '<b>Test Case Failed for assertTrue: ',$message,'</b>';
      exit();
    }
  }

  function assertFalse($case, $message = 'A case was true!') {
    if($case) {
      echo '<b>Test Case Failed for assertFalse: ',$message,'</b>';
      exit();
    }
  }

  function assertStringEquals($a, $b, $message = 'Two strings were not equal!') {
    if($a !== $b) {
      echo '<b>Test Case Failed for assertStringEquals: ',$message,'</b>';
      exit();
    }
  }

  function assertEquals($a, $b, $message = 'Two points were not equal!') {
    if($a != $b) {
      echo '<b>Test Case Failed for assertEquals: ',$message,'</b>';
      exit();
    }
  }

 ?>
