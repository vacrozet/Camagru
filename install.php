<?php 
require_once('./config/db.php');
$db = new mysqli($servername, $username, $mdp);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
// Create database
$sql = "CREATE DATABASE camagru";
if ($db->query($sql) === TRUE)
    echo "Database created successfully";
else
    echo "Error creating database: " . $db->error;
$db->close();
if (!$db = mysqli_connect($servername, $username, $mdp, $namedb))
	echo "ERROR\n";
else
{
	$chaine = file_get_contents("./db/camagru.sql");
	$tab = explode(";",$chaine);
	foreach ($tab as $key => $value) {
		mysqli_query($db, $value);
	}
}
?>