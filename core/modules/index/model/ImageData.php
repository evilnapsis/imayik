<?php


class ImageData {
	public static $tablename = "image";
	public function ImageData(){
		$this->name = "";
		$this->title = "";
		$this->description = "";
		$this->tags = "";
		$this->channel_id = "";
		$this->category_id = "";
		$this->privacy_id = "";
		$this->created_at = date("Y-m-d h:i:s",time());
	}

	public function getChannel(){ return ChannelData::getById($this->channel_id); }
	public function getLikes(){ return IsLikeData::getAllLikeByImageId($this->id); }
	public function getDisLikes(){ return IsLikeData::getAllDisLikeByImageId($this->id); }
	public function getViews() { return ImageViewData::getAllByImageId($this->id); }
	public function getFullPath(){ return "storage/channel/$this->channel_id/$this->name"; }

	public function add(){
		$sql = "insert into ".self::$tablename." (name,title,description,tags,created_at,channel_id,privacy_id) ";
		$sql .= "value (\"$this->name\",\"$this->title\",\"$this->description\",\"$this->tags\",\"$this->created_at\",\"$this->channel_id\",\"$this->privacy_id\")";
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

// partiendo de que ya tenemos creado un objecto ImageData previamente utilizamos el contexto
	public function update(){
	//	print_r($this->country);
		$sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",tags=\"$this->tags\",category_id=$this->category_id,privacy_id=$this->privacy_id where id=".$this->id;
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImageData());
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImageData());
	}

	public static function getAllByChannel($channel_id){
		$sql = "select * from ".self::$tablename." where channel_id=$channel_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function getAll(){
 		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function getAllByDay(){
 		$sql = "select *,date(created_at) as created_date,count(*) as total from ".self::$tablename." group by date(created_at) order by date(created_at) desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}



}

?>