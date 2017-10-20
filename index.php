<?php
define('BASEPATH',str_replace('\\','/',__DIR__));

require_once BASEPATH.'/Lib/Loader.php';
spl_autoload_register("\Lib\Loader::autoload");

return \Lib\Loader::router();

// function __autoload ($class) {
// 	require_once BASEPATH.'/'.$class.'.php';
// }