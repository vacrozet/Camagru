<?php
session_start();
require_once('../config/db.php');

function check_passwd($passwd, $re_passwd)
{
	$passwd = hash('whirlpool', $passwd);
	$re_passwd = hash('whirlpool', $re_passwd);
	if (strcmp($passwd, $re_passwd) == 0)
		return true;
	else
		return false;
}

if ($_POST['Login'] != "" && $_POST['Passwd'] != "" && $_POST['Re-passwd'] != "" && $_POST['submit'] == "Changer mon mot de passe")
{
	$oui = "OUI";
	$login = $_POST['Login'];
	$login = trim($login);
	$passwd = $_POST['Passwd'];
	$repasswd = $_POST['Re-passwd'];
	$passwd = trim($passwd);
	$repasswd = trim($repasswd);
	$passwd = hash('whirlpool', $passwd);
	$repasswd = hash('whirlpool', $repasswd);

	if (check_passwd($passwd, $repasswd) == false)
		$_SESSION['erreur_2'] = 1;
	if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
		echo "ERROR\n";
	$req = "SELECT * FROM `Utilisateur` WHERE `login` LIKE '".$login."' AND `Actif` LIKE 'NON'";
	$result = mysqli_query($db, $req);
	$nb = mysqli_num_rows($result);
	if ($nb == 1 && $_SESSION['erreur_2'] == 0)
	{
		if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
			echo "ERROR\n";
		$req = "UPDATE `Utilisateur` SET `password` = '".$passwd."', `actif` = 'OUI' WHERE `login` = '".$login."'";
		mysqli_query($db, $req);
		header('Location: ../index.php');
	}
	else
		header('Location: ../index.php');
}
else
{
	if ($_POST['lgoin'] == "")
		$_SESSION['erreur_1'] = 1;
	if ($_POST['Passwd'] == "" || $_POST['Re-passwd'] == "")
		$_SESSION['erreur_2'] = 1;
	header('Location: ../page/modify_passwd.php');
}
?>