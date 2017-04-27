<?php
session_start();

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
	header('Location: ../index.php');
}

function getalluser()
{
    $array = array();
    $db = mysqli_connect('localhost', 'root', '', 'camagru');
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
if ($_POST['mail'] != "" && $_POST['Recup'] == "Reset password")
{
	$oui = "NON";
	$mail = $_POST['mail'];
	if (!($db = mysqli_connect('localhost', 'root', '', 'camagru')))
		echo "ERROR\n";
	$req = "SELECT * FROM `Utilisateur` WHERE `mail` LIKE '".$mail."'";
	$result = mysqli_query($db, $req);
	$nb = mysqli_num_rows($result);
	if ($nb == 1)
	{
	    $db = getalluser();
	    foreach ($db as $key => $value)
	    {
	    	if ($value['mail'] == $mail)
	    		 {
	    		 	$mail = $value['mail'];
	    		 	$login = $value['login'];
	    		 	if (!($db = mysqli_connect('localhost', 'root', '', 'camagru')))
						echo "ERROR\n";
	    		 	$req = "UPDATE `Utilisateur` SET `Actif` = '".$oui."' WHERE `login` = '".$login."'";
					mysqli_query($db, $req);
	    		 	send_mail($mail, $login);
	    		 }
	    }
	}
	else
	{
		$_SESSION['erreur_mail'] = 1;
		header('Location: ../page/recup_passwd.php');
	}
}
else
{
	$_SESSION['erreur_mail'] = 1;
	header('Location: ../page/recup_passwd.php');
}

?>