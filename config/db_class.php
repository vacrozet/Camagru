<?php  
require_once('./db.php');

class Database
{
	public $user = $username;

	function database($arg)
	{
		echo $arg;
	}
}

$user = new Database();
$user->database($user->user);

?>