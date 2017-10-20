<?php
namespace Lib\Core;

class Model {
	protected $sqls;
	protected $table;
	protected $primaryKey;
	public function __construct () {
		$this->res = \Lib\Core\Db::getDb();
	}

	public function where ($where) {
		if(isset($this->sqls['where'])) {
			$this->sqls['where'] .= ' and '.$where;
		}else{
			$this->sqls['where'] = 'where '.$where;
		}
		return $this;
	}

	public function order ($filed,$sort) {
		$this->sqls['order'] = 'order by '.$filed.' '.$sort;
		return $this;
	}

	public function find($id) {
		if(empty($id)) return false;
		$sql = "select * from {$this->table} where {$this->primaryKey} = {$id}";
		$result = $this->res->query($sql);
		if(!empty($result)) {
			$result = $result->fetch_array(MYSQLI_ASSOC);
		}
		$this->res->close();
		return $result;
	}

	public function get() {
		if(isset($this->sqls['filed'])){
			$sql = 'select ';
			foreach($this->sqls['filed'] as $v) {
				$sql .= $v.',';
			}
			$sql = substr($sql,0,-1) . ' from '.$this->table;
			unset($this->sqls['filed']);
		}else {
			$sql = 'select * from '.$this->table;
		}
		if(!empty($this->sqls)) {
			foreach($this->sqls as $val) {
				$sql .= ' '.$val;
			}
		}
		$sql .= ' limit 1;';
		$result = $this->res->query($sql);
		if(!empty($result)){
			$result = $result->fetch_array(MYSQLI_ASSOC);
		}
		$this->res->close();
		return $result;
	}

	public function select () {
		if(isset($this->sqls['filed'])){
			$sql = 'select ';
			foreach($this->sqls['filed'] as $v) {
				$sql .= $v.',';
			}
			$sql = substr($sql,0,-1) . ' from '.$this->table;
			unset($this->sqls['filed']);
		}else {
			$sql = 'select * from '.$this->table;
		}
		if(!empty($this->sqls)) {
			foreach($this->sqls as $val) {
				$sql .= ' '.$val;
			}
		}
		$result = $this->res->query($sql);
		if(!empty($result)){
			$result = $result->fetch_all(MYSQLI_ASSOC);
		}
		$this->res->close();
		return $result;
	}
}