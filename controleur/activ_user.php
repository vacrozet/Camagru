<?php
session_start();
require_once dirname(__DIR__)."/modele/user.class.php";

if (!empty($_GET['login']))
{
	$login = $_GET['login'];
	$sql = "SELECT * FROM `utilisateur` WHERE `Actif` LIKE :non";
	$fields = ['non' => "non"];
	$allUser = Database::getInstance()->request($sql, $fields, true);
	for ($i=0; $i < count($allUser); $i++) { 
		foreach ($allUser[$i] as $key => $value) {
			if ($key == "login")
				if ($login == hash("sha1", $value))
					$login = $value;
		}
	}
	if (strlen($login) <= 10)
	{
	$sql = "UPDATE `utilisateur` SET `Actif` = 'OUI' WHERE `login` LIKE :login";

	$fields = ['login' => $login];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	header('Location: ../index.php');
	}
	else
		header('Location: ../index.php');
}
else
	header('Location: ../index.php');
?>