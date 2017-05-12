<?php
require_once dirname(__DIR__)."/config/config.php";

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
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false
			];
			// $this->_PDOInstance = new PDO('mysql:host=127.0.0.1;port=8889;dbname='.BDD_DATABASE, BDD_USER, BDD_PASSWORD);
			$this->_PDOInstance = new PDO('mysql:host='.BDD_HOST.';dbname='.BDD_DATABASE, BDD_USER, BDD_PASSWORD, $options);
		}
		catch(PDOException $e)
		{
			 exit($e->getMessage());
		}
	}
	public static function getInstance()
	{
		if (is_null(self::$_instance))
			self::$_instance = new Database();
		return self::$_instance;
	}

	public function request($sql, $fields = false, $multiple = false)
	{
		try
		{
			$statement = $this->_PDOInstance->prepare($sql);

			if ($fields)
			{
				foreach ($fields as $key => $value)
				{
					if (is_int($value))
						$dataType = PDO::PARAM_INT;
					else if (is_bool($value))
						$dataType = PDO::PARAM_BOOL;
					else if (is_null($value))
						$dataType = PDO::PARAM_NULL;
					else
						$dataType = PDO::PARAM_STR;

					$statement->bindvalue(':'.$key, $value, $dataType);
				}
			}
			$statement->execute();

			if ($multiple)
				$result = $statement->fetchAll(PDO::FETCH_OBJ);
			else
				$result = $statement->fetch(PDO::FETCH_OBJ);

			$statement->closeCursor();
			return $result;
		}
		catch(Exception $e)
		{
			exit($e->getMessage());
		}
	}
}
?>