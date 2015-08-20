<?php

class TipData {
	public static $tablename = "tip";

	public function TipData(){
		$this->id = "";
		$this->title = "";
		$this->content = "";
		$this->author_id = Session::getUID();
		$this->tags = "";
		$this->created_at = time();
		$this->is_public = 0;
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (title,content,author_id,tags,created_at,is_public) value (\"$this->title\",\"$this->content\",$this->author_id,\"$this->tags\",$this->created_at,$this->is_public)";
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
		$data = new TipData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->title = $r['title'];
			$data->content = $r['content'];
			$data->author_id = $r['author_id'];
			$data->tags = $r['tags'];
			$data->created_at = $r['created_at'];
			$data->is_public = $r['is_public'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new TipData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->title = $r['title'];
			$data->content = $r['content'];
			$data->author_id = $r['author_id'];
			$data->tags = $r['tags'];
			$data->created_at = $r['created_at'];
			$data->is_public = $r['is_public'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getMy(){
		$sql = "select * from ".self::$tablename." where author_id=".Session::getUID()." order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new TipData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->author_id = $r['author_id'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_public = $r['is_public'];
			$cnt++;
		}
		return $array;
	}
	public static function getMyFriendTips(){
		$sql = "select *,tip.created_at as tcreated_at from follower inner join tip on (user_id=tip.author_id) where follower_id=".Session::getUID()." order by tcreated_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new TipData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->author_id = $r['author_id'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->created_at = $r['tcreated_at'];
			$array[$cnt]->is_public = $r['is_public'];
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
			$array[$cnt] = new TipData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->author_id = $r['author_id'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_public = $r['is_public'];
			$cnt++;
		}
		return $array;
	}


	public static function getAllByUID($author_id){
		$sql = "select * from ".self::$tablename." where author_id=".$author_id." order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new TipData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->author_id = $r['author_id'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_public = $r['is_public'];
			$cnt++;
		}
		return $array;
	}




public function getSender(){
	return UserData::getById($this->author_id);
}
}
?>