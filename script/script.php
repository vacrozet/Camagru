<?php  
session_start();
$_SESSION['changement'] = 1;
header('Location: ../page/mon_compte.php');
?>