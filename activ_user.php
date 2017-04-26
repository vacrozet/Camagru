<?php
session_start();
if ($_GET['login'] != "")
{
	$login = $_GET['login'];
	$oui = "OUI";
	if (!($db = mysqli_connect('localhost', 'root', '', 'camagru')))
		echo "ERROR\n";
	$req = "UPDATE `Utilisateur` SET `Actif` = '".$oui."' WHERE `utilisateur`.`login` = '".$login."'";
	$result = mysqli_query($db, $req);
	header('Location: ./index.php');
}
else
	echo "erreur";
?>