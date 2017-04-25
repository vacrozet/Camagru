<?php
session_start();

function send_mail($mail)
{
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = "Salut, si tu recois ce message c'est que tu as t'inscrire a mon super site \"CAMAGRU\"";
	$message_html = "
	<html>
	<head></head>
	<body style=\"display: flex; flex-direction: column;\">
		<div style=\"height: 200px; width: 400px; background-color: red; display: flex;\">
			<div style=\"margin: auto; height: 100px; width: 200px;\">
				<p style=\"text-align: center;\"><span style=\"font-size: 20px;\"><B>Bienvenue sur camagru</B></span><br />Merci de cliquer sur le bouton pour comfirmer votre inscription</p>
			</div>
		</div>
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex;\">
			<div style=\"margin: auto;\">
				<a href=\"#\"><button style=\"height: 100px; width: 100px; border-radius: 100%;\">Clique ici</button></a>
			</div>
		</div>
	</body>
	</html>";
	//==========	 
	 
	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Creation de Compte Camagru";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: \"Camagru\"<noreply@gmail.com>".PHP_EOL;
	$header.= "Reply-to: \"Camagru\" <noreply@gmail.com>".PHP_EOL;
	$header.= "MIME-Version: 1.0".PHP_EOL;
	$header.= "Content-Type: multipart/mixed;".PHP_EOL." boundary=\"$boundary\"".PHP_EOL;
	//==========
	 
	//=====Création du message.
	$message = PHP_EOL."--".$boundary.PHP_EOL;
	$message.= "Content-Type: multipart/alternative;".PHP_EOL." boundary=\"$boundary_alt\"".PHP_EOL;
	$message.= PHP_EOL."--".$boundary_alt.PHP_EOL;
	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".PHP_EOL;
	$message.= "Content-Transfer-Encoding: 8bit".PHP_EOL;
	$message.= PHP_EOL.$message_txt.PHP_EOL;
	//==========
	 
	$message.= PHP_EOL."--".$boundary_alt.PHP_EOL;
	 
	//=====Ajout du message au format HTML.
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".PHP_EOL;
	$message.= "Content-Transfer-Encoding: 8bit".PHP_EOL;
	$message.= PHP_EOL.$message_html.PHP_EOL;
	//==========
	 
	//=====On ferme la boundary alternative.
	$message.= PHP_EOL."--".$boundary_alt."--".PHP_EOL;
	//==========
	 
	 
	 
	$message.= PHP_EOL."--".$boundary.PHP_EOL;
	//========== 
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	// echo $mail;
	// echo $sujet;
	// echo $message;
	// echo $header;
	 
	//==========
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
if ($_POST['Login'] != "" && $_POST['Recup'] == "Recevoir un nouveau mot de passe")
{
	$login = $_POST['Login'];
	if (!($db = mysqli_connect('localhost', 'root', '', 'camagru')))
		echo "ERROR\n";
	
	$req = "SELECT * FROM `Utilisateur` WHERE `login` LIKE '".$login."'";
	$result = mysqli_query($db, $req);
	$nb = mysqli_num_rows($result);
	if ($nb == 1)
	{
	    $db = getalluser();
	    foreach ($db as $key => $value)
	    {
	    	if ($value['login'] == $login)
	    		 {
	    		 	$mail = $value['mail'];
	    		 	send_mail($mail);
	    		 }
	    }
	}
	else
		header('Location: ./recup_passwd.html');
}
else
	header('Location: ./recup_passwd.html');

?>