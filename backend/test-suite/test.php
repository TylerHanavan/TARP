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

    // Query the database to create a new table - courses
    $rs = $database->createCoursesTable();

    // Explain the result of creating the table.
    if($rs) {
      echo '<p>Created table <em>courses</em>.</p><br />';
    } else {
      $size = $database->getSizeCoursesTable();
      echo '<p>Warning: Table <em>courses</em> already exists. This may result in some test cases not being able to be fully tested. ', $size, ' elements already exist in-table.</p><br />';
    }

    // Query the database to create a new table - feedback
    $rs = $database->createFeedbackTable();

    // Explain the result of creating the table.
    if($rs) {
      echo '<p>Created table <em>feedback</em>.</p><br />';
      assertEquals(sizeof($database->getFeedback(1)), 0); // Since table should be empty, ensure it is
    } else {
      $size = $database->getSizeFeedbackTable();
      echo '<p>Warning: Table <em>feedback</em> already exists. This may result in some test cases not being able to be fully tested. ', $size, ' elements already exist in-table.</p><br />';
    }

    // Query the database to create a new table - tas
    $rs = $database->createTAsTable();

    // Explain the result of creating the table.
    if($rs) {
      echo '<p>Created table <em>tas</em>.</p><br />';
    } else {
      $size = $database->getSizeTAsTable();
      echo '<p>Warning: Table <em>tas</em> already exists. This may result in some test cases not being able to be fully tested. ', $size, ' elements already exist in-table.</p><br />';
    }

    $database->addFeedback(1, 1, 'Test', 'good job', 'JohnWick', 3, 2, 1, 'yahoo@gmail.com');

    assertFalse(sizeof($database->getFeedback(1)) == 0); // Ensure the feedback table isn't empty

    /* End Unit Testing Here */
    /* DO NOT ADD UNIT TESTS BEYOND THIS COMMENT */

  } catch(Exception $e) {
    echo '<b>An exception occurred during testing! Message: </b>', $e->message;
    //var_dump($e);
    exit();
  }

  echo '<br /><br /><em>All test cases passed. Congratulations.</em>'; // If the test suite reaches this point, then we have successfully passed each test case

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
