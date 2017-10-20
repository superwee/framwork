<?php
namespace Lib\Core\Drive;

class Pdo {
	public function __construct () {

	}

	public static function loadDb() {
		$config = \Lib\Loader::getDbConfig();
		$dsn = "mysql:dbname={$config['dbname']};host={$config['host']};";
		$user = $config['user'];
		$passwd = $config['passwd'];
		try{
			$res = new \PDO($dsn,$user,$passwd);
		}catch(PDOException $e){
			throw new Exception($e->getMessage(), 1);
			
		}
	} 
}