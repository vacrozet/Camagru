<?php 
session_start();
require_once('../config/db.php');
$login = $_SESSION['user_name'];

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


if ($_POST['passwd'] != "" && $_POST['suppresion'] == "Supprimer le compte")
{
	$passwd = $_POST['passwd'];
	$passwd = hash('whirlpool', $passwd);
	if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
		echo "ERROR\n";	
	$db = getalluser($servername, $username, $mdp, $namedb);
    foreach ($db as $key => $value)
    {
    	if ($value['login'] == $login)
    	{
    		if ($value['password'] == $passwd)
	    	{	
	    		if ($value['admin'] == "NON")
	    		{
	    			if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
						echo "ERROR\n";	
	    			$req = "DELETE FROM `Utilisateur` WHERE `login` LIKE '".$login."'";
		    		mysqli_query($db, $req);
					$_SESSION['user_name'] = "";
					header('Location: ../index.php');
		    	}
		    }
	    	else
	    	{
	    		echo "erreur";
	    	}
	    }
	}
}
?>