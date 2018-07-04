<?php

  /* The database class is a wrapper for PDO. In it, functions for retrieving, storing, deleting, and modifying data in MySQL exist. */

  class Database {

    function __construct($address, $database, $username, $password) {

      $this->address = $address;
      $this->database = $database;
      $this->username = $username;
      $this->password = $password;

    }

    function __destruct() {

    }

    function connect() {

      $this->pdo = new PDO('mysql:host='.$this->address.';dbname='.$this->database, $this->username, $this->password);

    }

    /* General-case query; Queries the database and returns the result. */
    function query($query) {
      $st = $this->pdo->prepare($query);
      return $st->execute();
    }

    /*
     Create the users table
    */
    function createUsersTable() {
      return $this->query('CREATE TABLE users (id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(24), password VARCHAR(2048))');
    }

    /*
      Get size of users table
    */
    function getSizeUsersTable() {
      $st = $this->pdo->prepare("SELECT COUNT(*) FROM users");
      $st->execute();
      $ret = $st->fetch();
      return $ret[0];
    }

    /*
      Verifies that user exists in database with given password
    */
    function compareUserCredentials($username, $password) {
      $st = $this->pdo->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
      $st->bindParam(':username', $username);
      $st->bindParam(':password', $password);
      $st->execute();
      return $st->fetchAll();
    }

    /*
      Create the TAs table
    */
    function createTAsTable() {
      return $this->query('CREATE TABLE tas (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(256), course INT, deleted TINYINT DEFAULT 0)');
    }

    function getSizeTAsTable() {
      $st = $this->pdo->prepare("SELECT COUNT(*) FROM tas");
      $st->execute();
      $ret = $st->fetch();
      return $ret[0];
    }

    /*
      Create the courses table
    */
    function createCoursesTable() {
      return $this->query('CREATE TABLE courses (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(256), instructor INT, deleted TINYINT DEFAULT 0)');
    }

    function getSizeCoursesTable() {
      $st = $this->pdo->prepare("SELECT COUNT(*) FROM courses");
      $st->execute();
      $ret = $st->fetch();
      return $ret[0];
    }

    /*
      Create the feedback table
    */
    function createFeedbackTable() {
      return $this->query('CREATE TABLE feedback (id INT PRIMARY KEY AUTO_INCREMENT, course INT, ta INT, description VARCHAR(2048), name VARCHAR(128), comments VARCHAR(2048), experience INT, importance INT, communication INT, email VARCHAR(128), ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP)');
    }

    function getSizeFeedbackTable() {
      $st = $this->pdo->prepare("SELECT COUNT(*) FROM feedback");
      $st->execute();
      $ret = $st->fetch();
      return $ret[0];
    }

    /*
      Retrieve feedback items from a specified course
    */
    function getFeedback($course) {
      $st = $this->pdo->prepare('SELECT * FROM feedback WHERE course=:course');
      $st->bindParam(':course', $course);
      $st->execute();
      return $st->fetchAll();
    }

    function getFeedbackByTA($ta) {
      $st = $this->pdo->prepare('SELECT * FROM feedback WHERE ta=:ta');
      $st->bindParam(':ta', $ta);
      $st->execute();
      return $st->fetchAll();
    }

    /*
      Add a feedback item to the feedback table
    */
    function addFeedback($course, $ta, $description, $comments, $name, $overallExperience, $comm, $importance, $email) {
      $st = $this->pdo->prepare('INSERT INTO feedback (course, ta, description, comments, name, experience, importance, communication, email) VALUES (:course, :ta, :description, :comments, :name, :experience, :importance, :comm, :email)');
      $st->bindParam(':course', $course);
      $st->bindParam(':ta', $ta);
      $st->bindParam(':description', $description);
      $st->bindParam(':comments', $comments);
      $st->bindParam(':name', $name);
      $st->bindParam(':experience', $overallExperience);
      $st->bindParam(':importance', $importance);
      $st->bindParam(':comm', $comm);
      $st->bindParam(':email', $email);
      return $st->execute();
    }

    /*
      Add a course (its name and an instructor) to the courses table
    */
    function addCourse($name, $instructor) {
      $st = $this->pdo->prepare('INSERT INTO courses (name, instructor) VALUES (:name, :instructor)');
      $st->bindParam(':name', $name);
      $st->bindParam(':instructor', $instructor);
      $st->execute();

	  $st = $this->pdo->prepare('SELECT * FROM courses ORDER BY id DESC LIMIT 1');
	  $st->execute();
	  return $st->fetch();
    }

	/*
      Add a ta (their name and linked course) to the tas table
    */
	function addTA($name, $course) {
	  $st = $this->pdo->prepare('INSERT INTO tas (name, course) VALUES (:name, :course)');
	  $st->bindParam(':name', $name);
	  $st->bindParam(':course', $course);
	  return $st->execute();
	}

  function removeTA($id, $course) {
    $st = $this->pdo->prepare('DELETE FROM tas WHERE id = :id AND course = :course');
    $st->bindParam(':id', $id);
    $st->bindParam(':course', $course);
    return $st->execute();
  }

    /*
      Retreive a list of courses from the courses table
    */
    function getCourses($instructor = -1) {
      if($instructor == -1)
        $st = $this->pdo->prepare('SELECT * FROM courses WHERE deleted=0');
      else {
        $st = $this->pdo->prepare('SELECT * FROM courses WHERE deleted=0 AND instructor=:instructor');
        $st->bindParam(':instructor', $instructor);
      }
      $st->execute();
      return $st->fetchAll();
    }

	function translateTA($ta) {
		$st = $this->pdo->prepare('SELECT name FROM tas WHERE id=:id');
		$st->bindParam(':id', $ta);
		$st->execute();
		return $st->fetch();
	}

    /*
      Retrieve a list of TAs from the tas table
    */
    function getTAs() {
      $st = $this->pdo->prepare('SELECT * FROM tas');
      $st->execute();
      return $st->fetchAll();
    }

    /*
      Retrieve a list of TAs from the tas table for a given course
    */
    function getTAsForCourse($course) {
      $st = $this->pdo->prepare('SELECT * FROM tas WHERE course = :course');
      $st->bindParam(':course', $course);
      $st->execute();
      return $st->fetchAll();
    }

    function removeCourse($course) {
      $st = $this->pdo->prepare('UPDATE courses SET deleted = 1 WHERE id = :course');
      $st->bindParam(':course', $course);
      return $st->execute();
    }
}
