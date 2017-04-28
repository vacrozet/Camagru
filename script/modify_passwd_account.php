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

function check_passwd($passwd, $re_passwd)
{
	$passwd = hash('whirlpool', $passwd);
	$re_passwd = hash('whirlpool', $re_passwd);
	if (strcmp($passwd, $re_passwd) == 0)
		return true;
	else
		return false;
}

if ($_POST['oldpasswd'] != "" && $_POST['newpasswd'] != "" && $_POST['re_newpasswd'] != "" && $_POST['confirmer'] = "confirmer")
{
	$oldpasswd = $_POST['oldpasswd'];
	$newpasswd = $_POST['newpasswd'];
	$re_newpasswd = $_POST['re_newpasswd'];
	$newpasswd = hash('whirlpool', $newpasswd);
	$re_newpasswd = hash('whirlpool', $re_newpasswd);
	$oldpasswd = hash('whirlpool', $oldpasswd);
	if (check_passwd($newpasswd, $re_newpasswd) == false)
	{
		$_SESSION['erreur_pass_1'] = 1;
		header('Location: ../page/mon_compte.php');
	}
	if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
		echo "ERROR\n";	
	$db = getalluser($servername, $username, $mdp, $namedb);
    foreach ($db as $key => $value)
	{
		if ($value['login'] == $login)
		{
			if ($value['password'] == $oldpasswd)
			{
    			if (!($db = mysqli_connect($servername, $username, $mdp, $namedb)))
					echo "ERROR\n";
    			$req = "UPDATE `Utilisateur` SET `password` = '".$newpasswd."' WHERE `login` = '".$login."'";
	    		mysqli_query($db, $req);
	    		$_SESSION['pass_ok'] = 1;
				header('Location: ../page/mon_compte.php');
		    }
	    	else
	    	{
	    		$_SESSION['erreur_pass_2'] = 1;
	    		header('Location: ../page/mon_compte.php');
	    	}
	    }
	}
}
?>