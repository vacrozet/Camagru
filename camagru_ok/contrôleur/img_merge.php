<?php  
session_start();
require_once dirname(__DIR__)."/modèle/user.class.php";

if (!empty($_POST['img_prec']) && !empty($_POST['png_prec']) && !empty($_POST['top_prec']) && !empty($_POST['left_prec']))
{
	$png = $_POST['png_prec'];
	$png = substr($png, 2);
	$png = "../".$png;
	$filtre = file_get_contents($png);
	file_put_contents("./filtre.png", $filtre);
	$filtre = imagecreatefrompng("./filtre.png");

	$photo = substr($_POST['img_prec'], 22);
	$photo = base64_decode($photo);
	file_put_contents("./image.png", $photo);
	$photo = imagecreatefrompng("./image.png");

	$top = $_POST['top_prec'];
	$left = $_POST['left_prec'];
	imagecopy($photo, $filtre, $left, $top, 0, 0, 128, 128);
	$login = $_SESSION['user_name'];

	$sql = "SELECT * FROM `Utilisateur` 
			WHERE `login` LIKE :login";
	$fields = ['login' => $login];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	if ($allUser == 1)
	{
		foreach ($allUser as $key => $value) {
			if ($key == "index")
				$index_user = $value;
			if ($key == "nb_picture")
				$nb_photo = $value;
		}
	}
	$nb_photo++;
	$Path = "../img/users/".$login.$nb_photo.".png";
	imagepng($photo, $Path);
	unlink("./filtre.png");
	unlink("./image.png");

	$sql = "INSERT INTO `picture`(`index`, `author`, `path`, `date`, `id_photo`)
			VALUES (NULL, :login, :adresse, NULL, NULL)";
	$fields = [
				'login' => $login,
				'adresse' => $Path
				];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	$sql = "UPDATE `Utilisateur` 
			SET `nb_picture` = :nb_photo
			WHERE `login` LIKE :login";

	$fields = [
				'login' => $login,
				'nb_photo' => $nb_photo
				];
	$allUser = Database::getInstance()->request($sql, $fields, false);
	header('Location: ../index.php?vue=10');
}
else
	header('Location: ../index.php?vue=post');
?>