<?php

class PrivacyData {
	public static $tablename = "privacy";

	public function PrivacyData(){
		$this->id = "";
		$this->name = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name) value (\"$this->name\")";
		Executor::doit($sql);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PrivacyData());
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PrivacyData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PrivacyData());
	}

}
?>