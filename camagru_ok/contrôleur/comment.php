<?php
session_start();
require_once dirname(__DIR__)."/modèle/user.class.php";

$commentaire = $_POST['commentaire'];
$index_user = $_POST['id_user'];
$id_photo = $_POST['id_photo'];
$login_user = $_POST['login_user'];

$sql = "INSERT INTO `comment` (`index`, `id_photo`, `id_login`, `login`, `comment`, `date`) VALUES (NULL, :id_photo, :id_user, :login_user, :commentaire, CURRENT_TIMESTAMP)";

	$fields = [
				'id_photo' => $id_photo,
				'id_user' => $index_user,
				'commentaire' => $commentaire,
				'login_user' => $login_user
			];
$commentaire = Database::getInstance()->request($sql, $fields, true);
header('Location: ../index.php?vue=10');
?>