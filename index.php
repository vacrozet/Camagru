<?php 
session_start();
include('./vue/header.php');
if ($_SESSION['user_name'] == "")
{
	if ($_GET['vue'] == "pass")
		include('./vue/pass.php');
	else if ($_GET['vue'] == "reinit")
		include('./vue/reinit.php');
	else
		include('./vue/acceuil.php');
}
else
{
	if ($_GET['script'] == "logout")
		require_once('Location: ./root.php?scritp=logout');
	else if ($_GET['vue'] == "account")
		include('./vue/account.php');
	else if ($_GET['vue'] == "post")
		include('./vue/post.php');
	else
		include('./vue/the_wall.php');
}
include('./vue/footer.html');
