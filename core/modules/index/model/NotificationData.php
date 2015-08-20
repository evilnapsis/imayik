<?php

class NotificationData {
	public static $tablename = "notification";

	public function NotificationData(){
		$this->id = "";
		$this->brief = "";
		$this->content = "";

		$this->channel_id = "";
		$this->image_id = "";
		$this->comment_id = "";
		$this->album_id = "";
		$this->notification_type_id = "";


		$this->user_id = Session::getUID();
		$this->is_read = 0;
		$this->created_at = date('Y-m-d h:i:s',time());
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (brief,content,channel_id,image_id,comment_id,album_id,notification_type_id,user_id,is_read,created_at) value (\"$this->brief\",\"$this->content\",$this->channel_id,$this->image_id,$this->comment_id,$this->album_id,$this->notification_type_id,$this->user_id,$this->is_read,\"$this->created_at\")";
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

	public static function countByUID($uid){
		$sql = "select count(*) as count from ".self::$tablename." where user_id=$uid";
		$query = Executor::doit($sql);
		$found = null;
		$data = new NotificationData();
		while($r = $query->fetch_array()){
			$data->count = $r['count'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function countByChannelId($channel_id){
		$sql = "select count(*) as count from ".self::$tablename." where channel_id=$channel_id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new NotificationData();
		while($r = $query->fetch_array()){
			$data->count = $r['count'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new NotificationData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->content = $r['content'];
			$data->user_id = $r['user_id'];
			$data->prospect_id = $r['prospect_id'];
			$data->is_read = $r['is_read'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new NotificationData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->content = $r['content'];
			$data->user_id = $r['user_id'];
			$data->prospect_id = $r['prospect_id'];
			$data->is_read = $r['is_read'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new NotificationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->prospect_id = $r['prospect_id'];
			$array[$cnt]->is_read = $r['is_read'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getAllByUID($uid){
		$sql = "select * from ".self::$tablename." where user_id=$uid order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new NotificationData());
	}

	public static function getAllByChannelId($channel_id){
		$sql = "select * from ".self::$tablename." where channel_id=$channel_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new NotificationData());
	}

	public static function getLast5ByChannelId($channel_id){
		$sql = "select * from ".self::$tablename." where channel_id=$channel_id order by created_at desc limit 5";
		$query = Executor::doit($sql);
		return Model::many($query[0],new NotificationData());
	}

}
?>