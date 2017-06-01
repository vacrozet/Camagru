<?php 
session_start();
require_once dirname(__DIR__)."/modele/user.class.php";

function erreur_prog($number)
{
	$_SESSION['erreur'] = $number;
	header('Location: ../index.php?vue=reinit');
	exit();
}

function check_passwd($passwd, $re_passwd)
{
	$passwd = hash('whirlpool', $passwd);
	$re_passwd = hash('whirlpool', $re_passwd);
	if (strcmp($passwd, $re_passwd) != 0)
		erreur_prog(2);
	return $passwd;
}


if (!empty($_POST['Re-passwd']) && !empty($_POST['Passwd']))
{
	$login = $_POST['login'];
	$passwd = check_passwd($_POST['Passwd'], $_POST['Re-passwd']);
	$sql = "UPDATE `Utilisateur` 
			SET `Actif` = :oui
			WHERE `login` LIKE :login";

	$fields = [
				'login' => $login,
				'oui' => "OUI"
				];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	header('location: ../index.php');
}
else
	header('Location: ../index.php?vue=reinit');
?>