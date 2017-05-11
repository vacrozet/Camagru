<?php  
include_once('./config.php');

$db = file_get_contents('../db/camagru.sql');

try 
{
    $dbh = new PDO('mysql:host='.BDD_HOST, BDD_USER, BDD_PASSWORD);
    $dbh->query($db);
    $dbh = null;
} 
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>