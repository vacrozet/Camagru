<?php
require_once dirname(__DIR__)."/modèle/user.class.php";

$index_photo = $_POST['id_photo'];

$sql = "DELETE FROM `Picture`
		WHERE `index` = :id_photo";
$fields = [
			'id_photo' => $index_photo
			];
$lol = Database::getInstance()->request($sql, $fields, true);
header('Location: ../index.php?vue=10');
?>