<?php
session_start();

function send_mail($mail)
{
	$mail = "crozet.valentin.42@gmail.com";
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
	{
	    $passage_ligne = "\r\n";
	}
	else
	{
	    $passage_ligne = "\n";
	}
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
	$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
	//==========
	 
	//=====Lecture et mise en forme de la pièce jointe.
	$fichier   = fopen("image.jpg", "r");
	$attachement = fread($fichier, filesize("image.jpg"));
	$attachement = chunk_split(base64_encode($attachement));
	fclose($fichier);
	//==========
	 
	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Hey mon ami !";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: \"WeaponsB\"<crozet.valentin@gmail.com>".$passage_ligne;
	$header.= "Reply-to: \"WeaponsB\" <crozet.valentin@gmail.com>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	//==========
	 
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	 
	//=====Ajout du message au format HTML.
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	 
	//=====On ferme la boundary alternative.
	$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
	//==========
	 
	 
	 
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	//========== 
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	echo "ok";
	// echo $mail;
	// echo $sujet;
	// echo $message;
	// echo $header;
	 
	//==========
}

function getalluser()
{
    $array = array();
    $db = mysqli_connect('localhost', 'root', 'root', 'camagru');
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
	if (!($db = mysqli_connect('localhost', 'root', 'root', 'camagru')))
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