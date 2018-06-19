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

    function createTAsTable() {
      return $this->query('CREATE TABLE tas (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(256), course INT)');
    }

    function createCoursesTable() {
      return $this->query('CREATE TABLE courses (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(256), instructor INT)');
    }

    function createFeedbackTable() {
      return $this->query('CREATE TABLE feedback (id INT PRIMARY KEY AUTO_INCREMENT, course INT, ta INT, description VARCHAR(2048), name VARCHAR(128), comments VARCHAR(2048), experience INT, importance INT, communication INT, email VARCHAR(128), ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP)');
    }

    function getFeedback($course) {
      $st = $this->pdo->prepare('SELECT * FROM feedback WHERE course=:course');
      $st->bindParam(':course', $course);
      $st->execute();
      return $st->fetchAll();
    }

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

    function addCourse ($name, $instructor){
      $st = $this->pdo->prepare('INSERT INTO courses (name, instructor) VALUES (:name, :instructor)');
      $st->bindParam(':name', $name);
      $st->bindParam(':instructor', $instructor);
      return $st->execute();
    }

    function getCourses () {
      $st = $this->pdo->prepare('SELECT * FROM courses');
      $st->execute();
      return $st->fetchAll();
    }

    function getTAs () {
      $st = $this->pdo->prepare('SELECT * FROM tas');
      $st->execute();
      return $st->fetchAll();
    }

  }

 ?>
