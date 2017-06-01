<?php 

$commentaire = "<sript>alert(\"coucou\");</script>";

preg_replace('#<script>#', 'no', $commentaire); 
$result = preg_match('#<script>#', $commentaire);

echo $result;
 ?>