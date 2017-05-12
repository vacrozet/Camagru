<?php
session_start();
require_once dirname(__DIR__)."/models/user.class.php";

function send_mail($mail, $login)
{
	$lien = "http://localhost:8080/camagru/page/reinit_passwd.php";
	$message_txt = "Salut, si tu recois ce message c'est que tu as t'inscrire a mon super site \"CAMAGRU\"";
	$message_html = "
	<html>
	<head></head>
	<body style=\"display: flex; flex-direction: row;\">
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex; border-radius: 8px 0 0 8px;\">
			<div style=\"margin: auto; height: 100px; width: 200px;\">
				<p style=\"text-align: center;\"><span style=\"font-size: 20px;\"><B>Réinitilisation du mot de passe de ".$login."</B></span><br />Merci de cliquer sur le lien  qui ce trouve sur le coter pour récupérer ton mot de passe.</p>
			</div>
		</div>
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex; border-radius: 0 8px 8px 0;\">
			<div style=\"margin: auto;\">
				<a href=".$lien.">Récupère ton mot de passe.</a>
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

function set_login_no_actif($login)
{
 	$sql = "UPDATE `Utilisateur` 
 			SET `Actif` = 'NON' 
 			WHERE `login` = :login";
	$fields = ['login' => $login];
	$allUser = Database::getInstance()->request($sql, $fields, false);
}

if (!empty($_POST['mail']) && isset($_POST['Recup']))
{
	$mail = $_POST['mail'];
	$sql = "SELECT * FROM `Utilisateur` 
			WHERE `mail` LIKE :mail
			AND `Actif` LIKE 'OUI'";
	$fields = ['mail' => $mail];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	if (count($allUser) == 1)
	{
		foreach ($allUser as $key => $value) {
			if ($key == "login")
				$login = $value;
		}
		set_login_no_actif($login);
	    send_mail($mail, $login);
		header('Location: ../page/recup_passwd.php');
	}
	else
	{
		$_SESSION['erreur'] = 2;
		header('Location: ../page/recup_passwd.php');

	}
}
else
{
	$_SESSION['erreur'] = 1;
	header('Location: ../page/recup_passwd.php');
}
?>