<?php
session_start();
require_once dirname(__DIR__)."/models/user.class.php";

function send_mail($mail, $login)
{
	$lien = "http://localhost:8080/camagru/script/activ_user.php?login=".$login."";
	$message_txt = "Salut, si tu recois ce message c'est que tu as t'inscrire a mon super site \"CAMAGRU\"";
	$message_html = "
	<html>
	<head></head>
	<body style=\"display: flex; flex-direction: column;\">
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex;\">
			<div style=\"margin: auto; height: 100px; width: 200px;\">
				<p style=\"text-align: center;\"><span style=\"font-size: 20px;\"><B>Bienvenue sur camagru ".$login."</B></span><br />Merci de cliquer sur le bouton pour comfirmer votre inscription</p>
			</div>
		</div>
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex;\">
			<div style=\"margin: auto;\">
				<a href=".$lien.">Clique ici</a>
			</div>
		</div>
	</body>
	</html>";
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	$sujet = "Creation de Compte Camagru";
	$header = "From: \"Camagru\"<noreply@gmail.com>".PHP_EOL;
	$header.= "Reply-to: \"Camagru\" <noreply@gmail.com>".PHP_EOL;
	$header.= "MIME-Version: 1.0".PHP_EOL;
	$header.= "Content-Type: multipart/mixed;".PHP_EOL." boundary=\"$boundary\"".PHP_EOL;
	$message = PHP_EOL."--".$boundary.PHP_EOL;
	$message.= "Content-Type: multipart/alternative;".PHP_EOL." boundary=\"$boundary_alt\"".PHP_EOL;
	$message.= PHP_EOL."--".$boundary_alt.PHP_EOL;
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".PHP_EOL;
	$message.= "Content-Transfer-Encoding: 8bit".PHP_EOL;
	$message.= PHP_EOL.$message_txt.PHP_EOL;
	$message.= PHP_EOL."--".$boundary_alt.PHP_EOL;
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".PHP_EOL;
	$message.= "Content-Transfer-Encoding: 8bit".PHP_EOL;
	$message.= PHP_EOL.$message_html.PHP_EOL;
	$message.= PHP_EOL."--".$boundary_alt."--".PHP_EOL;
	$message.= PHP_EOL."--".$boundary.PHP_EOL;
	mail($mail,$sujet,$message,$header);
}

function erreur_prog($number)
{
	$_SESSION['erreur'] = $number;
	header('Location: ./page/inscription.php');
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

function check_mobile($numero)
{
	if (empty($numero))
		return NULL;
	if ($numero[0] != "0")
		erreur_prog(8);
	if (!preg_match('#^[0-9]{10,10}$#', $numero) == 1)
		erreur_prog(8);
	return $numero;
}

function check_cp($cp)
{
	if (empty($cp))
		return NULL;
	if (!preg_match('#[0-9]{5}#', $cp))
		erreur_prog(6);
}

function check_mail($mail)
{
	if (empty($numero))
		erreur_prog(9);
	if (!preg_match('#^[a-z0-9._-]+@(gmail|hotmail|me).[a-z]{2,4}$#', $mail) == 1)
		erreur_prog(9);
	return $mail;
}

function check_alpha($alpha, $number)
{
	if (empty($alpha))
		return NULL;
	if (!preg_match('#^[a-zA-Zéèêëàâîïôöûü-]+$#', $alpha))
		erreur_prog($number);
	return $alpha;
}

function check_exist($login, $mail)
{
	$sql = "SELECT * FROM Utilisateur";
	$allNews = Database::getInstance()->request($sql);
	foreach ($allNews as $key => $value) {
		if (($key == "login" && $value == $login) || 
			($key == "mail" && $value == $mai))
			erreur_prog(11);
	}
}

if (!empty($_POST['Login']) && !empty($_POST['Passwd']) && 
	!empty($_POST['Re-passwd']) && !empty($_POST['Mail']) && 
	!empty($_POST['condition']) && isset($_POST['inscription']))
{
	$login = trim($_POST['Login']);
	$passwd = check_passwd($_POST['Passwd'], $_POST['Re-passwd']);
	$prenom = check_alpha(trim($_POST['Prenom']), 3);
	$nom = check_alpha(trim($_POST['Nom']), 4);
	$numero = check_mobile(trim($_POST['Numero']);
	$cp = check_cp(trim($_POST['cp']);
	$ville = check_alpha(trim($_POST['Ville']), 7);
	$mail = check_mail($_POST['Mail']);
	check_exist($login, $mail);

	$sql = "INSERT INTO `Utilisateur` (`index`, `login`, `password`, `nom`, `prenom`, `adresse`, `CP`, `Ville`, `numero`, `mail`, `Actif`, `admin`) 
			VALUES (NULL, :login, :passwd, :nom, :prenom, :adresse, :cp, :ville, :numero, :mail, 'NON', 'NON')";

	$fields = [	'login' => $login,
				'passwd' => $passwd,
				'nom' => $nom,
				'prenom' => $prenom,
				'adresse' => $adresse,
				'cp' => $cp,
				'ville' => $ville,
				'numero' => $numero,
				'mail' => $mail
				];
	$allNews = Database::getInstance()->request($sql, $fields, false);
	send_mail($mail, $login);
	$_SESSION['erreur'] = 12;
}
else
	$_SESSION['erreur'] = 1;
header('Location: ../page/inscription.php');
?>