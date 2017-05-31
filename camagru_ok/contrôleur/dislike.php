<?php 
require_once dirname(__DIR__)."/modèle/user.class.php";

$index_login = $_POST['id_user'];
$index_photo = $_POST['id_photo'];

$sql = "DELETE FROM `like` 
		WHERE `index_login` LIKE :id_login 
		AND `index_photo` LIKE :id_photo";
$fields = [
			'id_photo' => $index_photo,
			'id_login' => $index_login
			];

$lol = Database::getInstance()->request($sql, $fields, true);
header('Location: ../index.php?vue=10');
?>