<?php
namespace App\Controller\Home;
use Lib\Core\Controller;

use App\Model\User;
class Index extends Controller{
	public function index () {
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$user = new User();
		if($id) {
			$result = $user->where("user_id = {$id}")->select();
		}else{
			$result = $user->select();
		}
		$title = 'welcome';

		$this->assign('title',$title);
		$this->assign('result',$result);
		$this->display('/home/index');
	}
}