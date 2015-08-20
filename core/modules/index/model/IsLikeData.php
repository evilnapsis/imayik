<?php

class IsLikeData {
	public static $tablename = "is_like";

	public function IsLikeData(){
		$this->id = "";
		$this->user_id = Session::getUID();
		$this->image_id = "";
		$this->is_like = 0;
		$this->created_at = date('Y-m-d h:i:s',time());
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (user_id,image_id,is_like,created_at) value ($this->user_id,$this->image_id,\"$this->is_like\",\"$this->created_at\")";
		Executor::doit($sql);
	}
	public function getUser(){
		return UserData::getById($this->user_id);
	}
	public function getImage(){
		return ImageData::getById($this->image_id);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set user_id=\"$this->user_id\",image_id=\"$this->image_id\",created_at=\"$this->created_at\",is_like=\"$this->is_like\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getJobByUID($image_id,$uid){
		$sql = "select * from ".self::$tablename." where image_id=$image_id and user_id=$uid";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());	}



	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());
			}

	public static function getAllLikeImageUser($image_id,$user_id){
		$sql = "select * from ".self::$tablename." where image_id=$image_id and user_id=$user_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());
	}

	public static function getAllLikeByImageId($image_id){
		$sql = "select * from ".self::$tablename." where image_id=$image_id and is_like=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());
	}

	public static function getAllDisLikeByImageId($image_id){
		$sql = "select * from ".self::$tablename." where image_id=$image_id and is_like=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());
	}


	public static function getAllByImageId($image_id){
		$sql = "select * from ".self::$tablename." where image_id=$image_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());
	}

	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new IsLikeData());
	}

}
?>