<?php
namespace Lib\Core\Drive;

class Mysql {
	public function __construct () {
		
	}

	public static function loadDb () {
		$config = \Lib\Loader::getDbConfig();
		$host = $config['host'].':'.$config['port'];
		$user = $config['user'];
		$passwd = $config['passwd'];
		$dbname = $config['dbname'];
		$res = mysql_connect($host,$user,$passwd);
		mysql_select_db($dbname,$res);
		mysql_set_charset('utf-8');
		return $res;
	}
}