<?php
session_start();
require_once dirname(__DIR__)."/modele/user.class.php";

function send_mail($mail, $login)
{
	$sha = hash('sha1', $login);
	$lien = "http://localhost:8080/camagru/controleur/activ_user.php?login=".$sha."";
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
	$header = "From: \"Camagru\"<camagru@gmail.com>".PHP_EOL;
	$header.= "Reply-to: \"Camagru\" <camagru@gmail.com>".PHP_EOL;
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
	header('Location: ../index.php');
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

function check_mail($mail)
{
	if (!preg_match('#^[a-z0-9._-]+@(gmail|hotmail|me).[a-z]{2,4}$#', $mail) == 1)
		erreur_prog(9);
	return $mail;
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
	$mail = check_mail($_POST['Mail']);
	check_exist($login, $mail);

	$sql = "INSERT INTO `Utilisateur` (`index`, `login`, `password`, `mail`, `Actif`, `admin`, `nb_picture`) 
			VALUES (NULL, :login, :passwd, :mail, 'NON', 'NON', '0')";

	$fields = [	'login' => $login,
				'passwd' => $passwd,
				'mail' => $mail
				];
	$allNews = Database::getInstance()->request($sql, $fields, false);
	send_mail($mail, $login);
	$_SESSION['erreur'] = 12;
}
else
	$_SESSION['erreur'] = 1;
header('Location: ../index.php');
?>