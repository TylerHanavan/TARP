<?php

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  /* Basic Includes, such as database, credentials, etc. */
  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/database.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/CSE442-542/2018-Summer/team03/backend/sql/credentials.php';

  try {

    /* Begin Unit Testing Here */

    // Create a dummy database to check to ensure the constructor accepts the proper parameters in the proper order
    $database = new Database('localhost', 'database', 'username', 'password');

    assertStringEquals($database->address, 'localhost'); // Test the database to see if its address is correct
    assertStringEquals($database->database, 'database'); // Test the database to see if its database name is correct
    assertStringEquals($database->username, 'username'); // Test the database to see if its username is correct
    assertStringEquals($database->password, 'password'); // Test the database to see if its password is correct

    // Create a connection to the real database
    $database = new Database($CREDENTIALS['address'], $CREDENTIALS['database'], $CREDENTIALS['username'], $CREDENTIALS['password']);

    $database->connect(); // Test the database to see if we can successfully connect. No assertX needed; exception will cause the test to fail if connection is unsuccessful

    $database->query('CREATE TABLE feedback (id INT PRIMARY KEY AUTO_INCREMENT, course INT, ta INT, description VARCHAR(2048), ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP)');

    /* End Unit Testing Here */
    /* DO NOT ADD UNIT TESTS BEYOND THIS COMMENT */

  } catch(Exception $e) {
    echo '<b>An exception occurred during testing!</b>';
    var_dump($e);
    exit();
  }

  echo 'All test cases passed. Congratulations.'; // If the test suite reaches this point, then we have successfully passed each test case

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
