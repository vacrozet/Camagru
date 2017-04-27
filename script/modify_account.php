<?php  
session_start();
require_once('../config/db.php');
$login = $_SESSION['user_name'];

function check_alpha($alpha)
{
	if (preg_match('#^[a-zA-Zéèêëàâîïôöûü-]+$#', $alpha))
		return true;
	else
		return false;
}

function check_cp($cp)
{
	if (preg_match('#[0-9]{5}#', $cp))
		return true;
	else
		return false;
}

function check_mobile($numero)
{
	if ($numero[0] != "0")
		return false;
	if (preg_match('#^[0-9]{10,10}$#', $numero) == 1)
		return true;
	else
		return false;
}

if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
	echo "ERROR\n";	
if ($_POST['prenom'] != "")
{
	$prenom = $_POST['prenom'];
	if (check_alpha($prenom) == true)
	{
		$req = "UPDATE `Utilisateur` SET `prenom` = '".$prenom."' WHERE `login` = '".$login."'";
		mysqli_query($db, $req);
	}
	else
		echo "erreur";
}
if ($_POST['nom'] != "")
{
	$nom = $_POST['nom'];
	if (check_alpha($nom) == true)
	{
		$req = "UPDATE `Utilisateur` SET `nom` = '".$nom."' WHERE `login` = '".$login."'";
		mysqli_query($db, $req);
	}
	else
		echo "erreur";
}
if ($_POST['adresse'] != "")
{
	$adresse = $_POST['adresse'];
	$req = "UPDATE `Utilisateur` SET `adresse` = '".$adresse."' WHERE `login` = '".$login."'";
	mysqli_query($db, $req);
}
if ($_POST['cp'] != "")
{
	$cp = $_POST['cp'];
	if (check_cp($cp) == true)
	$req = "UPDATE `Utilisateur` SET `CP` = '".$cp."' WHERE `login` = '".$login."'";
	mysqli_query($db, $req);
}
if ($_POST['Ville'] != "")
{
	$ville = $_POST['Ville'];
	if (check_alpha($ville) == true)
	{
		$req = "UPDATE `Utilisateur` SET `Ville` = '".$ville."' WHERE `login` = '".$login."'";
		mysqli_query($db, $req);
	}
	else
		echo "erreur";
}
if ($_POST['numero'] != "")
{
	$numero = trim($_POST['numero']);
	if (check_mobile($numero) == true)
	{
		$req = "UPDATE `Utilisateur` SET `numero` = '".$numero."' WHERE `login` = '".$login."'";
		mysqli_query($db, $req);
	}
	else
		echo "erreur";	
}
$_SESSION['changement'] = 0;
header('Location: ./mon_compte.php');
?>