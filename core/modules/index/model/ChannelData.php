<?php


class ChannelData {
	public static $tablename = "channel";
	public function ChannelData(){
		$this->id = "";
		$this->user_id = "";
		$this->title = "";
		$this->description = "";
		$this->tags = "";
		$this->image = "NULL";
		$this->website = "NULL";
		$this->fburl = "NULL";
		$this->twurl = "NULL";
		$this->gpurl = "NULL";
		$this->user_id = 0;
		$this->created_at = date('Y-m-d h:i:s',time());
	}


public function getUser(){
	return UserData::getById($this->user_id);
}
public function getAlbums(){
	return AlbumData::getAllByChannelId($this->id);
}


	public function add(){
		$sql = "insert into ".self::$tablename." (title,description,user_id,created_at) ";
		$sql .= "value (\"$this->title\",\"$this->description\",$this->user_id,\"$this->created_at\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ChannelData previamente utilizamos el contexto
	public function update(){
		 $sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",tags=\"$this->tags\",image=\"$this->image\",website=\"$this->website\",fburl=\"$this->fburl\",twurl=\"$this->twurl\",gpurl=\"$this->gpurl\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ChannelData());
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ChannelData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ChannelData());

	}

	public static function getAllByUID($uid){
		$sql = "select * from ".self::$tablename." where user_id=$uid";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ChannelData());
	}

}

?>