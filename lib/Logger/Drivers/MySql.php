<?php 
namespace Logger\Drivers;

use Logger\LoggerInterface;
use Exception;
use PDO;
use PDOException;

class MySql implements LoggerInterface{
	
	const CONFIG_FILE = 'lib/Logger/Drivers/config_mysql.txt';

	private $db_connection = null;


	function __construct(){
		if (!file_exists(self::CONFIG_FILE))
			throw new Exception("MySql config file not found! Searched in lib/Logger/Drivers/CONFIG_FILE", 200);
			
		require_once('config_mysql.txt');
		if (!isset($host))
			throw new Exception("MySql host is not defined in ".self::CONFIG_FILE, 201);
		if (!isset($dbname))
			throw new Exception("MySql dbname is not defined in ".self::CONFIG_FILE, 202);
		if (!isset($username))
			throw new Exception("MySql username is not defined in ".self::CONFIG_FILE, 203);
		if (!isset($password))
			throw new Exception("MySql password is not defined in ".self::CONFIG_FILE, 204);

		$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

		try {
			$this->db_connection = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e ){
			throw new Exception($e->getMessage(), 205);
		}

		$sql = 'CREATE TABLE if not exists logger (
					id int unsigned not null AUTO_INCREMENT, 
					msg text,
					primary key (id))					
					ENGINE = InnoDB
					DEFAULT CHARACTER SET = utf8
					COLLATE = utf8_bin';

		$this->db_connection->exec($sql);

	}

	public function processLog($msg){
		$sql = 'INSERT INTO logger 
				SET msg = :msg ';
		$sth = $this->db_connection->prepare($sql);
		$sth->bindValue(':msg', $msg);
		return $sth->execute();
	}
}