<?php
session_start();

function getalluser()
{
    $array = array();
    $db = mysqli_connect('localhost', 'root', '', 'camagru');
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

if ($_POST['Login'] != "" && $_POST['Passwd'] != "" && $_POST['Connexion'] == "Connexion")
{
	$login = $_POST['Login'];
	$passwd = hash('whirlpool', $_POST['Passwd']);
	if (!($db = mysqli_connect('localhost', 'root', '', 'camagru')))
		echo "ERROR\n";

	$req = "SELECT * FROM `Utilisateur` WHERE `login` LIKE '".$login."' AND `password` LIKE '".$passwd."' AND `Actif` LIKE 'OUI'";
	$result = mysqli_query($db, $req);
	$nb = mysqli_num_rows($result);
	if ($nb == 1)
	{
		$db = getalluser();
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
	    header('Location: ../index.php');
?>