<?php
namespace Lib\Core;
use Lib\Template\plates\src\Engine;

class Controller{
	private $path = "/Tpl";
	private $ext = 'tpl.php';
	static $template = null;
	private $data = array();

	public function __construct () {
		
	}

	public function assign($key,$value) {
		if(empty($key) || empty($value)) {
			return false;
		}
		$this->data[$key] = $value;
	}

	public function display($name) {
		$obj = $this->getTemplate();
		if(empty($this->data)) {
			$result = $obj->make($name);
		}else{
			$result = $obj->render($name,$this->data);
		}
		die($result);
	}

	private function getTemplate () {
		if(self::$template == null) {
			self::$template = new Engine(BASEPATH.$this->path,$this->ext);
		}
		return self::$template;
	}
}