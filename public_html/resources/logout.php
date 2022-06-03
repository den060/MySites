<?php 
  require "db.php"; 
  session_start();
  unset($_SESSION['logged_user']);
  unset($_SESSION['Name_user']);
  header('Location: /');
  ?>