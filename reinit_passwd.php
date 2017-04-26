<?php
session_start();

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

	$login = $_POST['Login'];
	$login = trim($login);
	$passwd = $_POST['Passwd'];
	$repasswd = $_POST['Re-passwd'];
	$passwd = trim($passwd);
	$repasswd = trim($repasswd);
	$passwd = hash('whirlpool', $passwd);
	$repasswd = hash('whirlpool', $repasswd);

	if (check_passwd($passwd, $repasswd) == false)
		$_SESSION['erreur_passwd'] = 1;
	if (!($db = mysqli_connect('localhost', 'root', '', 'camagru')))
		echo "ERROR\n";
	$req = "SELECT * FROM `Utilisateur` WHERE `login` LIKE '".$login."' AND `Actif` LIKE 'NON'";
	$result = mysqli_query($db, $req);
	$nb = mysqli_num_rows($result);
	echo $nb;
	exit();
}
?>