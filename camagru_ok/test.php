<?php
require_once dirname(__DIR__)."/camagru_ok/modèle/user.class.php";

$login = "vacrozet";

$sql = "UPDATE `picture`
		SET `index`= NULL,
		`author`= :id_login,`path`=[value-3],`date`=[value-4] WHERE 1";

	$fields = ['login' => $login];
	$allUser = Database::getInstance()->request($sql, $fields, false);

?>