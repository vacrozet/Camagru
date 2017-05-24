<?php 
session_start();
include('./vue/header.php');
if ($_SESSION['user_name'] == "")
	include('./vue/acceuil.php');
else
{
	if ($_GET['script'] == "logout")
		require_once('Location: ./root.php?scritp=logout');

	if ($_GET['vue'] == "account")
		include('./vue/account.php');

	if ($_GET['vue'] == "wall");

	else
		include('./vue/the_wall.php');
}
include('./vue/footer.html');
