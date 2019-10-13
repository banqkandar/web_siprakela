<?php
  error_reporting(0);
  session_start();
  $server = 'localhost'; // e.g 'localhost' or '192.168.1.100'
  $user   = 'root'; // username database
  $pass   = ''; // password database
  $db     = 'siprakela'; // nama database
  $con    = new mysqli($server, $user, $pass, $db);
  if ($con-> connect_error) {
    header("location:nodatabase.php");
    die("Database connection failed:  " . $con->connect_error);
  }
  ?>