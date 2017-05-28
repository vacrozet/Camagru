<?php  
require_once dirname(__DIR__)."/config/config.php";
require_once dirname(__DIR__)."/modèle/user.class.php";


$db = file_get_contents('./camagru.sql');

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