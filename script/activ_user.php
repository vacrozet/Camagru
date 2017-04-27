<?php
session_start();
require_once('../config/db.php');

if ($_GET['login'] != "")
{
	$login = $_GET['login'];
	$oui = "OUI";
	if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
		echo "ERROR\n";
	$req = "UPDATE `Utilisateur` SET `Actif` = '".$oui."' WHERE `utilisateur`.`login` = '".$login."'";
	$result = mysqli_query($db, $req);
	header('Location: ../index.php');
}
else
	echo "erreur";
?>