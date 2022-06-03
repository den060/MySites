<?php 
  require "db.php"; 
  session_start();
  unset($_SESSION['logged']);
  unset($_SESSION['Name']);
  header('Location: /resources/signup2.php');
  ?>