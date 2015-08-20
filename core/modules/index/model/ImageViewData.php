<?php

class ImageViewData {
	public static $tablename = "image_view";

	public function ImageViewData(){
		$this->id = "";
		$this->image_id = "";
		$this->realip = "";
		$this->user_id = "";
		$this->created_at = time();
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (image_id,realip,user_id,created_at) value (\"$this->image_id\",\"$this->realip\",$this->user_id,$this->created_at)";
		Executor::doit($sql);
	}

	public function getImage(){ return ImageData::getById($this->image_id); }


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
		return Model::many($query[0],new ImageViewData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageViewData());
	}

	public static function getAllByPopular(){
//		$sql = "select * from ".self::$tablename;
		$sql = "select *, count(*) as  total from ".self::$tablename." group by image_id order by total desc limit 10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageViewData());
	}

	public static function getAllPopularByChannelId($channel_id){
//		$sql = "select * from ".self::$tablename;
//		$sql = "select *, count(*) as  total from ".self::$tablename." group by image_id order by total desc limit 10";
	$sql = "select image_id,channel_id, count(*) as  total from image_view inner join image on(image.id=image_id) where channel_id=".$channel_id." group by image_id order by total desc limit 10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageViewData());
	}

	public static function getSearch($query){
//		$sql = "select * from ".self::$tablename;
//		$sql = "select *, count(*) as  total from ".self::$tablename." group by image_id order by total desc limit 10";
	$sql = "select image_id,title,description,tags,channel_id, count(*) as  total from image_view inner join image on(image.id=image_id) ";
	$sql .= " where ";
	$token = explode(" ", $query);
	if(count($token)==1){
	$sql .= "title like '%$token[0]%' ";
	$sql .= " or  description like '%$token[0]%' ";
	$sql .= "or tags like '%$token[0]%' ";
	}else if(count($token)==2){
	$sql .= "title like '%$token[0]%' or title like '%$token[1]%' ";
	$sql .= " or  description like '%$token[0]%' or description like '%$token[1]%' ";
	$sql .= "or tags like '%$token[0]%' or tags like '%$token[1]%' ";
	}else if(count($token)==3){
	$sql .= "title like '%$token[0]%' or title like '%$token[1]%' or title like '%$token[2]%' ";
	$sql .= " or  description like '%$token[0]%' or description like '%$token[1]%' or description like '%$token[2]%' ";
	$sql .= "or tags like '%$token[0]%' or tags like '%$token[1]%' or tags like '%$token[2]%' ";
	}
	else if(count($token)==4){
	$sql .= "title like '%$token[0]%' or title like '%$token[1]%' or title like '%$token[2]%' or title like '%$token[3]%' ";
	$sql .= " or  description like '%$token[0]%' or description like '%$token[1]%' or description like '%$token[2]%' or description like '%$token[3]%' ";
	$sql .= "or tags like '%$token[0]%' or tags like '%$token[1]%' or tags like '%$token[2]%' or tags like '%$token[3]%' ";
	}

	$sql .= "group by image_id order by total desc limit 10";


		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageViewData());
	}

	public static function getAllbyImageId($image_id){
		$sql = "select * from ".self::$tablename." where image_id=$image_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageViewData());
	}


}
?>