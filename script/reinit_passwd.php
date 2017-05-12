<?php
session_start();
require_once('../config/db.php');

function erreur_prog($number)
{
	$_SESSION['erreur'] = $number;
	header('Location: ../page/reinit_passwd.php');
	exit();
}

function check_passwd($passwd, $re_passwd)
{
	$passwd = hash('whirlpool', $passwd);
	$re_passwd = hash('whirlpool', $re_passwd);
	if (strcmp($passwd, $re_passwd) != 0)
		erreur_prog(1);
	return $passwd;
}

if (!empty($_POST['Login']) && !empty($_POST['Passwd']) &&
	!empty($_POST['Re-passwd']) && isset($_POST['submit']))
{
	$login = trim($_POST['Login']);
	$passwd = check_passwd($_POST['Passwd'], $_POST['Re-passwd']);


	$sql = "SELECT * FROM `Utilisateur` 
			WHERE `login` LIKE :login 
			AND `Actif` LIKE 'NON'";
	$fields = ['login' => $login];
	$allNews = Database::getInstance()->request($sql, $fields, false);
	if (count($allUser) == 1)
	{
		$sql = "UPDATE `Utilisateur` 
				SET `password` = :passwd, `actif` = 'OUI' 
				WHERE `login` = :login";
		$fields = ['passwd' => $passwd, 'login' => $login];
		$allUser = Database::getInstance()->request($sql, $fields, false);
		$_SESSION['erreur'] = 0;
		header('Location: ../page/reinit_passwd.php');
	}
	else
	{
		$_SESSION['erreur'] = 2;
		header('Location: ../page/reinit_passwd.php');
	}
}
else
{
	$_SESSION['erreur'] = 3
	header('Location: ../page/modify_passwd.php');
}
?>