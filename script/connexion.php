<?php
session_start();
require_once dirname(__DIR__)."/models/user.class.php";

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

if (isset())


if (isset($_POST['Login']) && isset($_POST['Passwd']) && isset($_POST['Connexion']))
{
	$login = $_POST['Login'];
	$passwd = hash('whirlpool', $_POST['Passwd']);
	$sql = "SELECT * FROM `Utilisateur` 
			WHERE `login` LIKE :login 
			AND `password` LIKE :passwd 
			AND `Actif` LIKE 'OUI'";

		$fields = [
		'login' => $login,
		'passwd' => $passwd,
		'nom' => $nom,
		'prenom' => $prenom,
		'cp' => $cp,
		'ville' => $ville,
		'numero' => $numero,
		'mail' => $amil,
		'actif' => $actif,
		'admin' => $admin
		];
		$allNews = Database::getInstance()->request($sql, $fields, false);






	$result = mysqli_query($db, $req);
	$nb = mysqli_num_rows($result);
	if ($nb == 1)
	{
		$db = getalluser($servername, $username, $mdp, $namedb);
	    foreach ($db as $key => $value)
	    {
	    	if ($value['login'] == $login)
	    		$_SESSION['admin'] = $value['admin'];
		}
		$_SESSION['user_name'] = $login;
    	header('Location: ../index.php');
	}
	else
	{
		$_SESSION['USER'] = 0;
    	header('Location: ../index.php');
	}
}
else
{
		echo "ERREUR";
	    header('Location: ../index.php');
}
?>