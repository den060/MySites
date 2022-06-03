<?php 

try {

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);  

  session_start();

  $pdo = new PDO("mysql:host=localhost;dbname=u91297ut_1", 'u91297ut_1', 'mUIp%tl6');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec("set names utf8");

  $settings = $pdo->prepare('SELECT * from settings');
  $settings->execute();
  while($row = $settings->fetch()) define($row["type"], $row["data"]);

  require('app/loader.php');

  $pdo = null;

}
catch(PDOException $e) {
    echo $e->getMessage();
}