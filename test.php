#!/usr/bin/php
<?php 
include_once("./models/user.class.php");

$sql = "UPDATE `Utilisateur` SET `admin`= 'NON', WHERE `login` = 'vacrozet'";

echo "ok_1";

$allNews = User_class::getInstance()->request($sql, fals, true);

echo "ok";
echo $allNews;
echo "ok";
?>