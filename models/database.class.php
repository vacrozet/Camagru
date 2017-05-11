<?php
require_once('../config/setup.php');
require_once('../config/config.php');

$db = file_get_contents('../db/camagru.sql');

class Database
{
	private $_PDOInstance;
	private static $_instance = null;

	private function __construct()
	{
		try
		{
			$options = 
			[
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
				PDO::ATTR_ERRMODE => PDO::ERROMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false
			]
			$this->_PDOInstance = New PDO('mysql:host='.BDD_HOST.';dbname='.BDD_DATABASE, BDD_USER, BDD_PASSWORD, $options);
		}
		catch(PDOException $e)
		{
			exit($e->getMessage());
		}
	}
	public static function getInstance()
	{
		if (is_null(self::$_instance))
			self::$_instance = new Databse();
		return self::$_instance;
	}
}
?>