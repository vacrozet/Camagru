<?php 
session_start();
require_once dirname(__DIR__)."/modele/user.class.php";

function send_mail($mail, $login)
{
	$sha = hash('whirlpool', hash('sha1', $login));
	$lien = "http://localhost:8080/camagru/index.php?vue=reinit&login=".$sha."";
	$message_txt = " \"CAMAGRU\"";
	$message_html = "
	<html>
	<head></head>
	<body style=\"display: flex; flex-direction: column;\">
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex;\">
			<div style=\"margin: auto; height: 100px; width: 200px;\">
				<p style=\"text-align: center;\"><span style=\"font-size: 20px;\"><B>Oublie MDP Camagru -> ".htmlspecialchars($login)."</B></span><br />Merci de cliquer sur le bouton pour acceder à la page de reinitialisation du mot de pass</p>
			</div>
		</div>
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex;\">
			<div style=\"margin: auto;\">
				<a href=".$lien.">Clique ici pour reinit</a>
			</div>
		</div>
	</body>
	</html>";
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	$sujet = "Mot de pass oublier";
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

	header('Location: ../index.php');
}

$mail = $_POST['mail'];

$sql = "SELECT * FROM `utilisateur` WHERE `mail` LIKE :mail";

$fields = ['mail' => $mail];

$user = Database::getInstance()->request($sql, $fields, true);

if (count($user) == 1)
{
	foreach ($user[0] as $key => $value) {
		if ($key == "login")
			$login = $value;
	}
	$sql = "UPDATE `utilisateur` SET `Actif`= 'NON' WHERE `login` LIKE :login";

	$fields = ['login' => $login];

	$user = Database::getInstance()->request($sql, $fields, true);
	send_mail($mail, $login);
}
else
{
	header('Location: ../index.php?vue=pass');
}
 ?>