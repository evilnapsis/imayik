<?php


class AlbumData {
	public static $tablename = "album";
	public function AlbumData(){
		$this->name = "";
		$this->title = "";
		$this->description = "";
		$this->tags = "";
		$this->channel_id = "";
		$this->category_id = "";
		$this->created_at = date("Y-m-d h:i:s",time());
	}

	public function getChannel(){ return ChannelData::getById($this->channel_id); }

	public function getImages(){ return AlbumImageData::getAllByAlbumId($this->id); }


//	public function getLikes(){ return IsLikeData::getAllLikeByImageId($this->id); }
//	public function getDisLikes(){ return IsLikeData::getAllDisLikeByImageId($this->id); }
//	public function getViews() { return ImageViewData::getAllByImageId($this->id); }


	public function add(){
		$sql = "insert into ".self::$tablename." (name,title,description,tags,created_at,channel_id,privacy_id) ";
		$sql .= "value (\"$this->name\",\"$this->title\",\"$this->description\",\"$this->tags\",\"$this->created_at\",\"$this->channel_id\",\"$this->privacy_id\")";
		return Executor::doit2($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto AlbumData previamente utilizamos el contexto
	public function update(){
	//	print_r($this->country);
		$sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",tags=\"$this->tags\",category_id=$this->category_id,privacy_id=$this->privacy_id where id=".$this->id;
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new AlbumData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->title = $r['title'];
			$data->name = $r['name'];
			$data->description = $r['description'];
			$data->tags = $r['tags'];
			$data->created_at = $r['created_at'];
			$data->channel_id = $r['channel_id'];
			$data->privacy_id = $r['privacy_id'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new AlbumData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->nick = $r['nick'];
			$data->name = $r['name'];
			$data->mail = $r['mail'];
			$data->password = $r['password'];
			$data->usertype = UserTypedata::getById($r['usertype_id']);
			$data->status = StatusData::getById($r['status_id']);
			$data->is_admin = $r['is_admin'];
			$data->is_verified = $r['is_verified'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getAllByChannelId($channel_id){
		$sql = "select * from ".self::$tablename." where channel_id=$channel_id order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new AlbumData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->channel_id = $r['channel_id'];
			$array[$cnt]->privacy_id = $r['privacy_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getAll(){
 		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new AlbumData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->channel_id = $r['channel_id'];
			$array[$cnt]->category_id = $r['category_id'];
			$array[$cnt]->privacy_id = $r['privacy_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>