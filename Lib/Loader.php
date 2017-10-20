<?php
namespace Lib;

class Loader {
	public static function autoload ($class) {
		require_once BASEPATH.'/'.$class.'.php';
	}

	public static function router () {
		$uris = $_SERVER['REQUEST_URI'];
		$uris = parse_url($uris);
		$uri = $uris['path'];
		if($pos = strpos($uri,'index.php')){
			$uri = substr($uri,$pos+9);
		}
		$uri_arr = explode('/',$uri);
		$module = isset($uri_arr[1]) ? $uri_arr[1] : '';
		$className = isset($uri_arr[2]) ? $uri_arr[2] : '';
		$action = isset($uri_arr[3]) ? $uri_arr[3] : '';
		$module = empty($module) ? 'Home' : $module;
		$className = empty($className) ? 'Index' : $className;
		$action = empty($action) ? 'index' : $action;
		$class = "\\App\\Controller\\{$module}\\{$className}";
		
		$obj = new $class;
		$obj->$action();
	}

	public static function getDbConfig () {
		$db = \Lib\configs\Config::$db;
		return $db;
	} 
}