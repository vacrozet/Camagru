<?php
session_start();
if ($_GET['script'] == "logout")
	require_once('./contrôleur/logout.php');

if ($_GET['vue'] == "account")
	header('Location: ./index.php?vue=account');
if ($_GET['vue'] == "10")
	header('Location: ./index.php?vue=10');
if ($_GET['vue'] == "post")
	header('Location: ./index.php?vue=post');

?>