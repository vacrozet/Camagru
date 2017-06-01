<?php 
session_start();
require_once dirname(__DIR__)."/modele/user.class.php";

$login = $_SESSION['user_name'];
$passwd = hash("whirlpool", $_POST['passwd']);

$sql = "SELECT * FROM `Utilisateur` 
	 		WHERE `login` LIKE :login
	 		AND `password` LIKE :passwd 
			AND `Actif` LIKE 'OUI'";
$fields = [
				'login' => $login,
				'passwd' => $passwd
			];
$User = Database::getInstance()->request($sql, $fields, true);

foreach ($User[0] as $key => $value) {
	if ($key == "index")
		$index = $value;
}

if (count($User))
{

	$sql = "DELETE FROM `picture` WHERE `author` LIKE :login";
	$fields = ['login' => $login];

	$final = Database::getInstance()->request($sql, $fields, false);

	$sql = "DELETE FROM `like` WHERE `index_login` LIKE :index";
	$fields = ['index' => $index];

	$final = Database::getInstance()->request($sql, $fields, false);

	$sql = "DELETE FROM `comment` WHERE `login` LIKE :login";
	$fields = ['login' => $login];

	$final = Database::getInstance()->request($sql, $fields, false);

	$sql = "DELETE FROM `utilisateur` WHERE `login` LIKE :login";
	$fields = ['login' => $login];

	$final = Database::getInstance()->request($sql, $fields, false);
}

$_SESSION['user_name'] = NULL;
header('Location: ../index.php');
?>