<?php
namespace App\Model;
use Lib\Core\Model;

class User extends Model{
	protected $table = 'user';
	protected $primaryKey = 'user_id';
}