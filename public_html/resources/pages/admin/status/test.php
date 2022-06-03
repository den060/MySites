<?php 

try {

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);  

  session_start();

  $pdo = new PDO("mysql:host=localhost;dbname=site", 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec("set names utf8");

  $settings = $pdo->prepare('SELECT * from settings');
  $settings->execute();
  while($row = $settings->fetch()) define($row["type"], $row["data"]);



  $pdo = null;

}
catch(PDOException $e) {
    echo $e->getMessage();
}?>

Здравствуйте, <?php echo htmlspecialchars($_POST['name']); ?>.
Вам <?php echo (int)$_POST['age']; ?> лет.

<?php
mysql_query("UPDATE `orders` SET `text` = 's' WHERE `orders`.`id` = 86");

?>