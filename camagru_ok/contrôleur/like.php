<?php
require_once dirname(__DIR__)."/modèle/user.class.php";

$index_login = $_POST['id_user'];
$index_photo = $_POST['id_photo'];

$sql = "SELECT * FROM `like`
			WHERE `index_photo` LIKE :index 
			AND `index_login` LIKE :index_login";

	$fields = [
				'index' => $index_photo,
				'index_login' => $index_login
			];

$alreadylike = Database::getInstance()->request($sql, $fields, true);
if (count($alreadylike) != 1)
{
	$sql = "INSERT INTO `like`(`index`, `index_photo`, `index_login`) 
			VALUES (NULL, :id_photo, :id_login)";
	$fields = [
				'id_photo' => $index_photo,
				'id_login' => $index_login
				];

	$lol = Database::getInstance()->request($sql, $fields, true);
}
header('Location: ../index.php?vue=10');
?>