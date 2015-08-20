<?php

class CommentData {
	public static $tablename = "comment";

	public function CommentData(){
		$this->id = "";
		$this->user_id = Session::getUID();
		$this->image_id = "";
		$this->content = 0;
		$this->created_at = date('Y-m-d h:i:s',time());
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (user_id,image_id,content,created_at) value ($this->user_id,$this->image_id,\"$this->content\",\"$this->created_at\")";
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
		$sql = "update ".self::$tablename." set user_id=\"$this->user_id\",image_id=\"$this->image_id\",created_at=\"$this->created_at\",content=\"$this->content\" where id=$this->id";
		Executor::doit($sql);
	}



	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CommentData());
	}



	public static function getAllByImageId($image_id){
		$sql = "select * from ".self::$tablename." where image_id=$image_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CommentData());
	}

	public static function getAllByChannelId($channel_id){
		$sql = "select * from ".self::$tablename." inner join image on (image.id=image_id) where channel_id=$channel_id order by comment.created_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CommentData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CommentData());
	}

}
?>