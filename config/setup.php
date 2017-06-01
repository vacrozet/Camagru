<?php 
	header("Location: ../index.php?vue=10");
	require('database.php');
	
	$sql = file_get_contents("./config/Database.sql");
	
	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_EXTRA_PARAMS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->query($sql);
	$pdo = null;
?>