<?php
session_start();
require_once dirname(__DIR__)."/models/user.class.php";

if (isset($_POST['Login']) && isset($_POST['Passwd']) && isset($_POST['Connexion']))
{
	$login = "vacrozet";
	$passwd = hash('whirlpool', "okok");
	$sql = "SELECT * FROM `Utilisateur` 
	 		WHERE `login` LIKE :login
	 		AND `password` LIKE :passwd 
			AND `Actif` LIKE 'OUI'";

	$fields = [
				'login' => $login,
				'passwd' => $passwd
			];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	if (count($allUser) == 1)
	{
		foreach ($allUser as $key => $value) {
			if ($key == "admin")
				$_SESSION['admin'] = $value;
		}
		$_SESSION['user_name'] = $login;
	}
	header('Location: ../index.php');
}
?>