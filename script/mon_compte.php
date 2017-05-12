<?php  
session_start();
require_once dirname(__DIR__)."/models/user.class.php";
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

function check_passwd($passwd, $re_passwd)
{
	$passwd = hash('whirlpool', $passwd);
	$re_passwd = hash('whirlpool', $re_passwd);
	if (strcmp($passwd, $re_passwd) == 0)
		return true;
	else
		return false;
}

if (isset($_POST['modify_1']))
{
	$_SESSION['changement'] = 1;
	header('Location: ../page/mon_compte.php');
}

if (isset($_POST['oldpasswd']) && isset($_POST['newpasswd']) && isset($_POST['re_newpasswd']) && isset($_POST['confirmer']))
{
	$oldpasswd = $_POST['oldpasswd'];
	$newpasswd = $_POST['newpasswd'];
	$re_newpasswd = $_POST['re_newpasswd'];
	$newpasswd = hash('whirlpool', $newpasswd);
	$re_newpasswd = hash('whirlpool', $re_newpasswd);
	$oldpasswd = hash('whirlpool', $oldpasswd);
	if (check_passwd($newpasswd, $re_newpasswd) == false)
	{
		$_SESSION['erreur_pass_1'] = 1;
		header('Location: ../page/mon_compte.php');
	}

	$sql = "SELECT * FROM Utilisateur WHERE login LIKE '".$login."'";

	$allUser = Database::getInstance()->request($sql);
	foreach ($allUser as $key => $value)
	{
		if ($key == "password" && $value == $oldpasswd)
		{
			$sql = "UPDATE `Utilisateur` SET `password` = :passwd WHERE `login` = :login";
			$fields = ['passwd' => $newpasswd, 'login' => $login];
			$allUser = Database::getInstance()->request($sql, $fields, false);
			$_SESSION['pass_ok'] = 1;
		}
	}
}

if ($_POST['prenom'] != "")
{
	$prenom = $_POST['prenom'];
	if (check_alpha($prenom) == true)
	{
		$sql = "UPDATE `Utilisateur` SET `prenom` = :prenom WHERE `login` = :login";
		$fields = ['prenom' => $prenom, 'login' => $login];
		$allUser = Database::getInstance()->request($sql, $fields, false);
		$_SESSION['modify_ok'] = 1;
	}
}

if ($_POST['nom'] != "")
{
	$nom = $_POST['nom'];
	if (check_alpha($nom) == true)
	{
		$sql = "UPDATE `Utilisateur` SET `nom` = :nom WHERE `login` = :login";
		$fields = ['nom' => $nom, 'login' => $login];
		$allUser = Database::getInstance()->request($sql, $fields, false);
		$_SESSION['modify_ok'] = 1;
	}
}

if ($_POST['adresse'] != "")
{
		$adresse = $_POST['adresse'];
		$sql = "UPDATE `Utilisateur` SET `adresse` = :adresse WHERE `login` = :login";
		$fields = ['adresse' => $adresse, 'login' => $login];
		$allUser = Database::getInstance()->request($sql, $fields, false);
		$_SESSION['modify_ok'] = 1;
}

if ($_POST['cp'] != "")
{
	$cp = $_POST['cp'];
	if (check_cp($cp) == true)
	{
		$sql = "UPDATE `Utilisateur` SET `CP` = :cp WHERE `login` = :login";
		$fields = ['cp' => $cp, 'login' => $login];
		$allUser = Database::getInstance()->request($sql, $fields, false);
		$_SESSION['modify_ok'] = 1;
	}
}

if ($_POST['Ville'] != "")
{
	$ville = $_POST['Ville'];
	if (check_alpha($ville) == true)
	{
		$sql = "UPDATE `Utilisateur` SET `Ville` = :Ville WHERE `login` = :login";
		$fields = ['Ville' => $ville, 'login' => $login];
		$allUser = Database::getInstance()->request($sql, $fields, false);
		$_SESSION['modify_ok'] = 1;
	}
}

if ($_POST['numero'] != "")
{
	$numero = trim($_POST['numero']);
	if (check_mobile($numero) == true)
	{
		$sql = "UPDATE `Utilisateur` SET `numero` = :numero WHERE `login` = :login";
		$fields = ['numero' => $numero, 'login' => $login];
		$allUser = Database::getInstance()->request($sql, $fields, false);
		$_SESSION['modify_ok'] = 1;
	}
}
if (isset($_POST['modify']))
	$_SESSION['changement'] = 0;

$sql = "SELECT * FROM Utilisateur WHERE login LIKE '".$login."'";

$allUser = Database::getInstance()->request($sql, false, false);
foreach ($allUser as $key => $value)
{
	if ($key == "login")
		$_SESSION['login'] = $value;
	if ($key == "nom")
		$_SESSION['nom'] = $value;
	if ($key == "prenom")
		$_SESSION['prenom'] = $value;
	if ($key == "adresse")
		$_SESSION['adresse'] = $value;
	if ($key == "CP")
		$_SESSION['CP'] = $value;
	if ($key == "Ville")
		$_SESSION['Ville'] = $value;
	if ($key == "numero")
		$_SESSION['numero'] = $value;
	if ($key == "mail")	
		$_SESSION['mail'] = $value;
}
header('Location: ../page/mon_compte.php');
?>