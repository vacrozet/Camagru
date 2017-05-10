<?php 

class Personnage
{
	public $pseudo;
	public $nom;
	public $prenom;
	public $adresse;
	public $cp;
	public $numero;

	function calcul($arg)
	{
		echo $arg;
		$this->nom = $this->cp;
		return;
	}
}

$user = new Personnage();

$user->pseudo = "vacrozet";
$user->nom = "crozet";
$user->prenom = "valentin";
$user->adresse = "270, rue des fargets";
$user->cp = "71570";
$user->numero = "0637879360";

echo $user->nom;
echo $user->calcul($user->nom);
echo $user->nom;


?>