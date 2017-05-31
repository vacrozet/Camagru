<?php
session_start();
require_once dirname(__DIR__)."/modèle/user.class.php";

if (isset($_POST['Login']) && isset($_POST['Passwd']) && isset($_POST['Connexion']))
{
	$login = $_POST['Login'];
	$passwd = hash('whirlpool', $_POST['Passwd']);
	$sql = "SELECT * FROM `Utilisateur` 
	 		WHERE `login` LIKE :login
	 		AND `password` LIKE :passwd 
			AND `Actif` LIKE 'OUI'";

	$fields = [
				'login' => $login,
				'passwd' => $passwd
			];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	if (count($allUser) == 1 && !empty($allUser))
	{
		foreach ($allUser as $key => $value) {
			if ($key == "index")
				$_SESSION['index_user'] = $value;
			if ($key == "admin")
				$_SESSION['admin'] = $value;
		}
		$_SESSION['user_name'] = $login;
	}
	header('Location: ../index.php?vue=10');
}
else
	header('Location: ../index.php');
?>