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

function check_mobile($numero)
{
	if ($numero[0] != "0")
		return false;
	if (preg_match('#^[0-9]{10,10}$#', $numero) == 1)
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

function check_mail($mail)
{
	if (preg_match('#^[a-z0-9._-]+@(gmail|hotmail|me).[a-z]{2,4}$#', $mail) == 1)
		return true;
	else
		return false;
}

if ($_POST['Login'] != "" && $_POST['Passwd'] != NULL && $_POST['Re-passwd'] != NULL && $_POST['Mail'] != "" && $_POST['condition'] == "ok" && $_POST['inscription'] == "Inscription")
 {
	$login = $_POST['Login'];
	$login = trim($login);
	$passwd = $_POST['Passwd'];
	$repasswd = $_POST['Re-passwd'];
	$passwd = trim($passwd);
	$repasswd = trim($repasswd);
	$passwd = hash('whirlpool', $passwd);
	$repasswd = hash('whirlpool', $repasswd);
	$prenom = $_POST['Prenom'];
	$prenom = trim($prenom);
	$nom = $_POST['Nom'];
	$nom = trim($nom);
	$adresse = $_POST['Adresse'];
	$adresse = trim($adresse);
	$prenom = $_POST['Prenom'];
	$prenom = trim($prenom);
	$cp = $_POST['cp'];
	$cp = trim($cp);
	$ville = $_POST['Ville'];
	$ville = trim($ville);
	$numero = $_POST['Numero'];
	$numero = trim($numero);
	$mail = $_POST['Mail'];
	$mail = trim($mail);

	if (check_passwd($passwd, $repasswd) == false)
		header('Location: ./inscription.html');
	if (check_mobile($numero) == false)
		$numero = "0600000000";
	if (check_cp($cp) == false)
		$cp = NULL;
	if (check_mail($mail) == false)
		header('Location: ./inscription.html');


	if (!($db = mysqli_connect('localhost', 'root', 'root', 'camagru')))
		echo "ERROR\n";
	$req = "SELECT * FROM `Utilisateur` WHERE `login` LIKE '".$login."'";
	$result = mysqli_query($db, $req);
	$nb = mysqli_num_rows($result);
	if ($nb == 0)
	{
		$req = "INSERT INTO `Utilisateur` (`index`, `login`, `password`, `nom`, `prenom`, `adresse`, `CP`, `Ville`, `numero`, `mail`) VALUES (NULL, '".$login."', '".$passwd."', '".$nom."', '".$prenom."', '".$adresse."', '".$cp."', '".$ville."', '".$numero."', '".$mail."')";
		mysqli_query($db, $req);
    	header('Location: ./inscription_ok.html');
	}
	else
		header('Location: ./inscription.html');
}
else
	header('Location: ./inscription.html');

?>