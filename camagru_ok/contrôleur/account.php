<?php  
session_start();
require_once dirname(__DIR__)."/modèle/user.class.php";
$login = $_SESSION['user_name'];

function check_passwd($passwd, $re_passwd)
{
	$passwd = hash('whirlpool', $passwd);
	$re_passwd = hash('whirlpool', $re_passwd);
	if (strcmp($passwd, $re_passwd) == 0)
		return true;
	else
		return false;
}

if (isset($_POST['oldpasswd']) && isset($_POST['newpasswd']) && isset($_POST['re_newpasswd']) && isset($_POST['confirmer']))
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

	$sql = "SELECT * FROM Utilisateur WHERE login LIKE '".$login."'";

	$allUser = Database::getInstance()->request($sql);
	foreach ($allUser as $key => $value)
	{
		if ($key == "password" && $value == $oldpasswd)
		{
			$sql = "UPDATE `Utilisateur` SET `password` = :passwd WHERE `login` = :login";
			$fields = ['passwd' => $newpasswd, 'login' => $login];
			$allUser = Database::getInstance()->request($sql, $fields, false);
			$_SESSION['pass_ok'] = 1;
		}
	}
}

if (isset($_POST['passwd']) && isset($_POST['delete'])) 
{
	$_SESSION['user_name'] = "";
	header ('Location: ../index.php');
}


header('Location: ../index.php?vue=account');
?>