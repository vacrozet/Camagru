<?php  
require_once('config.php');

$db = file_get_contents('../db/camagru.sql');

try {
    $dbh = new PDO('mysql:host=localhost', $user, $pass);
    $dbh->query($db);
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>