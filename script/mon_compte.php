<?php 
session_start();
require_once('../config/db.php');

function getalluser($servername, $username, $mdp, $namedb)
{
    $array = array();
    $db = mysqli_connect($servername, $username, $mdp, $namedb);
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
$login = $_SESSION['user_name'];
if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
	echo "ERROR\n";
$db = getalluser($servername, $username, $mdp, $namedb);
foreach ($db as $key => $value)
    {
    	if ($value['login'] == $login)
    		 {	$_SESSION['login'] = $value['login'];
    		 	$_SESSION['nom'] = $value['nom'];
    		 	$_SESSION['prenom'] = $value['prenom'];
    		 	$_SESSION['adresse'] = $value['adresse'];
    		 	$_SESSION['CP'] = $value['CP'];
    		 	$_SESSION['Ville'] = $value['Ville'];
    		 	$_SESSION['numero'] = $value['numero'];
    		 	$_SESSION['mail'] = $value['mail'];
    		 }
    }
    header('Location: ../page/mon_compte.php');
?>