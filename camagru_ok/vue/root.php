<?php  
session_start();

if ($_GET['script'] == "logout")
	header('../contrôleur/logout.php');
if ($_GET['vue'] == "account")
	header('../index.php?vue=account');
if ($_GET['vue'] == "post")
	header('Location: ../index.php?vue=post');
?>