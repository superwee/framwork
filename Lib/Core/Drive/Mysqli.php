<?php
namespace Lib\Core\Drive;

class Mysqli {
	public function __construct () {
		
	}

	public static function loadDb () {
		$config = \Lib\Loader::getDbConfig();
		$host = $config['host'];
		$port = $config['port'];
		$user = $config['user'];
		$passwd = $config['passwd'];
		$dbname = $config['dbname'];
		$res = mysqli_connect($host,$user,$passwd,$dbname,$port);
		return $res;
	}
}