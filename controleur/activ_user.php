<?php
session_start();
require_once dirname(__DIR__)."/modele/user.class.php";

if (!empty($_GET['login']))
{
	$login = $_GET['login'];
	$sql = "UPDATE `utilisateur` SET `Actif` = 'OUI' WHERE `login` LIKE :login";

	$fields = ['login' => $login];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	header('Location: ../index.php');
}
else
	echo "erreur";
?>