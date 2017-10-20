<?php
namespace Lib\Core;

class Db {
	private static $db;
	public static function getDb () {
		$db = \Lib\Loader::getDbConfig();

		switch ($db['type']){
			case 'Mysql' :
				$type = 'Mysql';
				break;
			case 'Mysqli':
				$type = 'Mysqli';
				break;
			case 'PDO':
				$type = 'Pdo';
				break;
			default:
				$type = '';
		}
		if(!self::$db) {
			self::$db = self::getDrive($type);
		}
		return self::$db;
	}

	private static function getDrive($type) {
		if($type == '') return false;
		$class = "\\Lib\\Core\Drive\\{$type}";
		return $class::loadDb();
	} 

	public function __destruct () {
		unset(self::$db);
	}
}