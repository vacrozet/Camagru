<?php
session_start();
require_once('../config/db.php');
$login = $_SESSION['user_name'];

function getalluser($servername, $username, $mdp, $namedb)
{
    $array = array();
    $db = mysqli_connect($servername, $username, $mdp, $namedb);
    $req = mysqli_prepare($db, "SELECT * FROM Utilisateur");
	if ($req != false)
	{
		mysqli_stmt_execute($req);
        $result = mysqli_stmt_get_result($req);
        while ($data = mysqli_fetch_assoc($result)) {
			$array[] = $data;
        }
		mysqli_close($db);
		return $array;
	}
	else
	{
		mysqli_close($db);
		return null;
	}
}

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

if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
	echo "ERROR\n";	
$db = getalluser($servername, $username, $mdp, $namedb);
foreach ($db as $key => $value)
    {
    	if ($value['login'] == $login)
    		 {	$_SESSION['login'] = $value['login'];
    		 	$_SESSION['nom'] = $value['nom'];
    		 	$_SESSION['prenom'] = $value['prenom'];
    		 	$_SESSION['adresse'] = $value['adresse'];
    		 	$_SESSION['CP'] = $value['CP'];
    		 	$_SESSION['Ville'] = $value['Ville'];
    		 	$_SESSION['numero'] = $value['numero'];
    		 	$_SESSION['mail'] = $value['mail'];
    		 	$_SESSION['password'] = $value['password'];
    		 }
    }

// echo $_SESSION['non']."\n";
// echo $_SESSION['prenom']."\n";
// echo $_SESSION['adresse']."\n";
// echo $_SESSION['CP']."\n";
// echo $_SESSION['Ville']."\n";
// echo $_SESSION['numero']."\n";
// echo $_SESSION['mail']."\n";

if (isset($_POST['modify_1']))
	$_SESSION['changement'] = 1;

if (isset($_POST['modify']))
	$_SESSION['changement'] = 0;

if (isset($_POST['oldpasswd']) && isset($_POST['newpasswd']) && isset($_POST['re_newpasswd']) && isset($_POST['confirmer']))
{
	$oldpasswd = $_POST['oldpasswd'];
	$newpasswd = $_POST['newpasswd'];
	$re_newpasswd = $_POST['re_newpasswd'];
	$newpasswd = hash('whirlpool', $newpasswd);
	$re_newpasswd = hash('whirlpool', $re_newpasswd);
	$oldpasswd = hash('whirlpool', $oldpasswd);
	if (check_passwd($newpasswd, $re_newpasswd) == false)
		$_SESSION['erreur_pass_1'] = 1;
	else
	{
		foreach ($db as $key => $value)
		{
			if ($value['login'] == $login)
			{
				if ($value['password'] == $oldpasswd)
				{
					$_SESSION['password'] = $newpasswd;
					$_SESSION['pass_ok'] = 1;
				}
				else
				$_SESSION['erreur_pass_2'] = 1;
			}
		}
	}
}

if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
	echo "ERROR\n";	

if ($_POST['prenom'] != "")
{
	$prenom = $_POST['prenom'];
	if (check_alpha($prenom) == true)
	{
		$_SESSION['prenom'] = $prenom;
		$_SESSION['modify_ok'] = 1;
	}
}

if ($_POST['nom'] != "")
{
	$nom = $_POST['nom'];
	if (check_alpha($nom) == true)
	{
		$_SESSION['nom'] = $nom;
		$_SESSION['modify_ok'] = 1;
	}
}

if ($_POST['adresse'] != "")
{
	$adresse = $_POST['adresse'];
	$_SESSION['adresse'] = $adresse;
	$_SESSION['modify_ok'] = 1;
}

if ($_POST['cp'] != "")
{
	$cp = $_POST['cp'];
	if (check_cp($cp) == true)
	{
		$_SESSION['CP'] = $cp;
		$_SESSION['modify_ok'] = 1;
	}
}

if ($_POST['Ville'] != "")
{
	$ville = $_POST['Ville'];
	if (check_alpha($ville) == true)
	{
		$_SESSION['Ville'] = $ville;
		$_SESSION['modify_ok'] = 1;
	}
}

	if ($_POST['numero'] != "")
	{
		$numero = trim($_POST['numero']);
		if (check_mobile($numero) == true)
		{
			$_SESSION['numero'] = $numero;
			$_SESSION['modify_ok'] = 1;
		}
}

if ($_SESSION['modify_ok'] == 1)
{
	if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
		echo "ERROR\n";	
	$nom = $_SESSION['nom'];
	$req = "UPDATE `Utilisateur` SET `password` = '".$_SESSION['password']."' AND SET `nom` = '".$nom."',`prenom` = '".$_SESSION['prenom']."',`adresse` = '".$_SESSION['adresse']."',`CP` = '".$_SESSION['CP']."',`Ville` = '".$_SESSION['Ville']."',`numero` = '".$_SESSION['numero']."', WHERE `login` = '".$login."'";
	mysqli_query($db, $req);
	// echo $_SESSION['non']."\n";
	// echo $_SESSION['prenom']."\n";
	// echo $_SESSION['adresse']."\n";
	// echo $_SESSION['CP']."\n";
	// echo $_SESSION['Ville']."\n";
	// echo $_SESSION['numero']."\n";
	// echo $_SESSION['mail']."\n";
}

header('Location: ../page/mon_compte.php');
?>