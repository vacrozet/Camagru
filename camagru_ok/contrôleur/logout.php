<?php 
session_start();
$_SESSION['user_name'] = NULL;
header('Location: ./index.php');
?>