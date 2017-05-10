<?php
require_once dirname(__DIR__) "./models/db_class.php";


class User_class
{
	public $index = NULL;
	public $login = NULL;
	public $passwd = NULL;
	public $prenom = NULL;
	public $nom = NULL;
	public $adresse = NULL;
	public $cp = NULL;
	public $numero = NULL;
	public $admin = "NON";
	public $ville = NULL;
	public $mail = NULL;
	public $actif = NULL;
	public $admin = NULL;

	public function add_user()
	{
		$db = Database::getInstance();

		$stmt = $db->prepare("INSERT INTO `Utilisateur`(`index`, `login`, `password`, `nom`, `prenom`, `adresse`, `CP`, `Ville`, `numero`, `mail`, `Actif`, `admin`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
		$result = $stmt->execute($this->index, $this->login, $this->passwd, $this->prenom, $this->nom, $this->adresse, $this->cp, $this->ville, $this->numero, $this->mail, $this->actif, $this->admin);
		return ($result);
	}

	public function getAllUser()
	{

	}

}

 ?>