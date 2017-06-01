<?php
require_once dirname(__DIR__)."/modele/user.class.php";

$index_photo = $_POST['id_photo'];

$sql = "DELETE FROM `picture`
		WHERE `index` = :id_photo";
$fields = [
			'id_photo' => $index_photo
			];
$lol = Database::getInstance()->request($sql, $fields, false);

$sql = "DELETE FROM `like`
		WHERE `index` = :id_photo";
$fields = [
			'id_photo' => $index_photo
			];
$lol = Database::getInstance()->request($sql, $fields, false);

$sql = "DELETE FROM `comment`
		WHERE `index` = :id_photo";
$fields = [
			'id_photo' => $index_photo
			];
$lol = Database::getInstance()->request($sql, $fields, false);
header('Location: ../index.php?vue=10');
?>