<?php
session_start();
require_once dirname(__DIR__)."/modèle/user.class.php";

$id_photo = "7";

$sql = "SELECT * FROM `comment` WHERE `id_photo` LIKE :id_photo";

$fields = ['id_photo' => $id_photo];

$allComment = Database::getInstance()->request($sql, $fields, true);

for ($i=0; $i < count($allComment); $i++) { 
	foreach ($allComment[$i] as $key => $value) {
		if ($key == "login") {
			$login_comment = $value;
		}
		if ($key == "comment") {
			$comment = $value;
		}
	}
}
?>