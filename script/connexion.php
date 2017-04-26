<?php
session_start();

if ($_POST['Login'] != "" && $_POST['Passwd'] != "" && $_POST['Connexion'] == "Connexion")
{
	$login = $_POST['Login'];
	$passwd = hash('whirlpool', $_POST['Passwd']);
	if (!($db = mysqli_connect('localhost', 'root', '', 'camagru')))
		echo "ERROR\n";

	$req = "SELECT * FROM `Utilisateur` WHERE `login` LIKE '".$login."' AND `password` LIKE '".$passwd."' AND `Actif` LIKE 'OUI'";
	$result = mysqli_query($db, $req);
	$nb = mysqli_num_rows($result);
	if ($nb == 1)
	{
		$_SESSION['user_name'] = $login;
    	header('Location: ../index.php');
	}
	else
	{
		$_SESSION['USER'] = 0;
    	header('Location: ../index.php');
	}
}
else
	    header('Location: ../index.php');
?>