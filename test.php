<?php 
include_once('./models/user.class.php');

$sql = "SELECT * FROM Utilisateur";

$allNews = User_class::getInstance()->request($sql);

var_dump($allNews);

?>