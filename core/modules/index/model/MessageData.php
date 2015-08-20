<?php

class MessageData {
	public static $tablename = "message";

	public function MessageData(){
		$this->id = "";
		$this->title = "";
		$this->content = "";
		$this->sender_id = Session::getUID();
		$this->receiver_id = "";
		$this->created_at = time();
		$this->is_read = 0;
	}

	public function add(){
		echo $sql = "insert into ".self::$tablename." (title,content,sender_id,receiver_id,created_at,is_read) value (\"$this->title\",\"$this->content\",$this->sender_id,$this->receiver_id,$this->created_at,$this->is_read)";
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
		$found = null;
		$data = new MessageData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->title = $r['title'];
			$data->content = $r['content'];
			$data->sender_id = $r['sender_id'];
			$data->receiver_id = $r['receiver_id'];
			$data->created_at = $r['created_at'];
			$data->is_read = $r['is_read'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new MessageData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->title = $r['title'];
			$data->content = $r['content'];
			$data->sender_id = $r['sender_id'];
			$data->receiver_id = $r['receiver_id'];
			$data->created_at = $r['created_at'];
			$data->is_read = $r['is_read'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getAllSents(){
		$sql = "select * from ".self::$tablename." where sender_id=".Session::getUID();
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new MessageData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->sender_id = $r['sender_id'];
			$array[$cnt]->receiver_id = $r['receiver_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_read = $r['is_read'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllReceived(){
		$sql = "select * from ".self::$tablename." where receiver_id=".Session::getUID();
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new MessageData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->sender_id = $r['sender_id'];
			$array[$cnt]->receiver_id = $r['receiver_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_read = $r['is_read'];
			$cnt++;
		}
		return $array;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new MessageData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->sender_id = $r['sender_id'];
			$array[$cnt]->receiver_id = $r['receiver_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_read = $r['is_read'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllGrouped(){
		$sql = "select sender_id,receiver_id,created_at,count(*) as count from ".self::$tablename." where receiver_id=".Session::getUID()." group by sender_id";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new MessageData();
			$array[$cnt]->sender_id = $r['sender_id'];
			$array[$cnt]->receiver_id = $r['receiver_id'];
			$array[$cnt]->count = $r['count'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllBySender($sender_id){
		 $sql = "select * from ".self::$tablename." where (receiver_id=".Session::getUID()." and sender_id=$sender_id) or (sender_id=".Session::getUID()." and receiver_id=$sender_id) order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new MessageData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->sender_id = $r['sender_id'];
			$array[$cnt]->receiver_id = $r['receiver_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_read = $r['is_read'];
			$cnt++;
		}
		return $array;
	}




public function getSender(){
	return UserData::getById($this->sender_id);
}
}
?>