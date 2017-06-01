<?php
require_once dirname(__DIR__)."/modele/user.class.php";

function send_mail($mail, $login)
{
	$message_txt = "Notification Like  | \"CAMAGRU\"";
	$message_html = "
	<html>
	<head></head>
	<body style=\"display: flex; flex-direction: column;\">
		<div style=\"height: 200px; width: 400px; background-color: grey; display: flex;\">
			<div style=\"margin: auto; height: 100px; width: 200px;\">
				<p style=\"text-align: center;\"><span style=\"font-size: 20px;\"><B>Bonjour ".$login."</B></span><br />Une personne à like votre photo sur Camagru</p>
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

$index_login = $_POST['id_user'];
$index_photo = $_POST['id_photo'];
$author = $_POST['author'];

$sql = "SELECT * FROM `like`
			WHERE `index_photo` LIKE :index 
			AND `index_login` LIKE :index_login";

	$fields = [
				'index' => $index_photo,
				'index_login' => $index_login
			];

$alreadylike = Database::getInstance()->request($sql, $fields, true);
if (count($alreadylike) != 1)
{
	$sql = "INSERT INTO `like`(`index`, `index_photo`, `index_login`) 
			VALUES (NULL, :id_photo, :id_login)";
	$fields = [
				'id_photo' => $index_photo,
				'id_login' => $index_login
				];

	$lol = Database::getInstance()->request($sql, $fields, true);
}

prep_mail($author);

?>