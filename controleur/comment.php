<?php
session_start();
require_once dirname(__DIR__)."/modele/user.class.php";

function send_mail($mail, $login)
{
	$message_txt = "Notification Commentaire | \"CAMAGRU\"";
	$message_html = "
	<html>
	<head></head>
	<body style=\"display: flex; flex-direction: column;\">
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex;\">
			<div style=\"margin: auto; height: 100px; width: 200px;\">
				<p style=\"text-align: center;\"><span style=\"font-size: 20px;\"><B>Bonjour ".$login."</B></span><br />Une personne à commenté votre photo sur Camagru</p>
			</div>
		</div>
	</body>
	</html>";
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	$sujet = "Notification LIKE";
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

	header('Location: ../index.php?vue=10');
}


function prep_mail($login)
{

	$sql = "SELECT * FROM `utilisateur`
				WHERE `login` LIKE :login";

		$fields = ['login' => $login];

	$author = Database::getInstance()->request($sql, $fields, true);

	foreach ($author[0] as $key => $value) {
		if ($key == "mail")
			$mail = $value;
	}
	send_mail($mail, $login);
}



$commentaire = $_POST['commentaire'];
$index_user = $_POST['id_user'];
$id_photo = $_POST['id_photo'];
$login_user = $_POST['login_user'];
$author = $_POST['author'];

$sql = "INSERT INTO `comment` (`index`, `id_photo`, `id_login`, `login`, `comment`, `date`) VALUES (NULL, :id_photo, :id_user, :login_user, :commentaire, CURRENT_TIMESTAMP)";

	$fields = [
				'id_photo' => $id_photo,
				'id_user' => $index_user,
				'commentaire' => $commentaire,
				'login_user' => $login_user
			];
$commentaire = Database::getInstance()->request($sql, $fields, true);
prep_mail($author);

?>