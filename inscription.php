<?php
session_start();
if ($_POST['login'] != "" && $_POST['passwd'] != "" && $_POST['repasswd'] != "" && $_POST['condition'] == 1 && $_POST['submit'] == "Inscription")
{
	$login = $_POST['login'];
	$passwd = hash('whirlpool', $_POST['passwd']);
	$repasswd = hash('whirlpool', $_POST['repasswd']);
	$numero = $_POST['numero']
	if (strcmp($passwd, $repasswd) != 0)
		header('Location: ./inscription,html');	
	if (strlen($numero))


	if (!($bd = mysqli_connect('localhost', 'root', '', 'rush00')))
		echo "ERROR\n";
	$req = "SELECT * FROM `utilisateur` WHERE `login` LIKE '".$login."'";
	$result = mysqli_query($bd, $req);
	echo $result."test\n";
	$nb = mysqli_num_rows($result);
	if ($nb == 0)
	{
		$req = "INSERT INTO `Utilisateur` (`index`, `login`, `password`, `nom`, `prenom`, `adresse`, `CP`, `Ville`, `numero`) VALUES (NULL, '".$login."', '".$passwd."', '".$nom."', '".$prenom."', '".$adresse."', '".$CP."', '".$ville."', '".$numero."')";
    	header('Location: ./admin.php');
	}
	else
	{
		echo "Utilisateur deja creer\n";
	}
}
else
	header('Location: ./inscription.html');

?>