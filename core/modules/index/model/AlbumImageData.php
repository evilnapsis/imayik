<?php


class AlbumImageData {
	public static $tablename = "album_image";
	public function AlbumImageData(){
		$this->album_id = "";
		$this->image_id = "";
		$this->created_at = date("Y-m-d h:i:s",time());
	}

	public function getChannel(){ return ChannelData::getById($this->channel_id); }

	public function getImage(){ return ImageData::getById($this->image_id); }


//	public function getLikes(){ return IsLikeData::getAllLikeByImageId($this->id); }
//	public function getDisLikes(){ return IsLikeData::getAllDisLikeByImageId($this->id); }
//	public function getViews() { return ImageViewData::getAllByImageId($this->id); }


	public function add(){
		$sql = "insert into ".self::$tablename." (album_id,image_id,created_at) ";
		$sql .= "value (\"$this->album_id\",\"$this->image_id\",\"$this->created_at\")";
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

// partiendo de que ya tenemos creado un objecto AlbumImageData previamente utilizamos el contexto
	public function update(){
	//	print_r($this->country);
		$sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",tags=\"$this->tags\",category_id=$this->category_id,privacy_id=$this->privacy_id where id=".$this->id;
		Executor::doit($sql);
	}



	public static function getAllByAlbumId($album_id){
		$sql = "select * from ".self::$tablename." where album_id=$album_id order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new AlbumImageData();
			$array[$cnt]->album_id = $r['album_id'];
			$array[$cnt]->image_id = $r['image_id'];
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
			$array[$cnt] = new AlbumImageData();
			$array[$cnt]->album_id = $r['album_id'];
			$array[$cnt]->image_id = $r['image_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>