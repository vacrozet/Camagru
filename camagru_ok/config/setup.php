<?php 
$DB_DSN = 'mysql:host=localhost;dbname=Database';
$DB_USER = 'root';
$DB_PASSWORD = 'root';
$DB_EXTRA_PARAMS = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
$sql = file_get_contents("./config/Database.sql");
$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_EXTRA_PARAMS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->query($sql);
$pdo = null;
header("Location: ../index.php");
?>