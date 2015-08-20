<?php

class FollowerData {
	public static $tablename = "follower";

	public function FollowerData(){
		$this->id = "";
		$this->user_id = Session::getUID();
		$this->channel_id = "";
		$this->created_at = date("Y-m-d h:i:s",time());
	}

	public function getChannel(){ return ChannelData::getById($this->channel_id); }
	public function getUser(){ return UserData::getById($this->user_id); }
	public function getImage(){ return ImageData::getById($this->image_id); }

	public function add(){
		 $sql = "insert into ".self::$tablename." (user_id,channel_id,created_at) value (\"$this->user_id\",$this->channel_id,\"$this->created_at\")";
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
		return Model::many($query[0],new FollowerData());
	}

	public static function existFollowerChannel($user_id,$channel_id){
		$sql = "select * from ".self::$tablename." where channel_id=".$channel_id." and user_id=".$user_id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new FollowerData());
	}

	public static function getByChannelId($channel_id){
		$sql = "select * from ".self::$tablename." where channel_id=".$channel_id." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FollowerData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new FollowerData());
	}

	public static function getUserIdActivity($user_id){
		$sql = "select *,image.id as image_id from ".self::$tablename." inner join image on (image.channel_id=follower.channel_id) where follower.user_id=$user_id order by image.created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FollowerData());
	}

	public static function getAllByPopular(){
//		$sql = "select * from ".self::$tablename;
		$sql = "select *,count(*) as total from ".self::$tablename." group by channel_id limit 10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FollowerData());
	}

}
?>