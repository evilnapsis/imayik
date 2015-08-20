<?php


class UserData {
	public static $tablename = "user";
	public function Userdata(){
		$this->nick = "";
		$this->mail = "";
		$this->password = "";
		$this->name = "";
		$this->lastname = "";
		$this->phone = "";
		$this->image = "";
		$this->is_admin = 0;
		$this->is_active = 1;
		$this->created_at = date("Y-m-d h:i:s",time());
	}

	public function getLiked(){ return IsLikeData::getAllByUserId($this->id); }

	public function getChannel(){
		$channels = ChannelData::getAllByUID($this->id);
		if(count($channels)>0){ return $channels[0]; }
	}

	public function add(){
		$sql = "insert into user (name,email,password,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->email\",\"$this->password\",\"$this->created_at\")";
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

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nick=\"$this->nick\",name=\"$this->name\",mail=\"$this->mail\",image=\"$this->image\",password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getByMail($mail){
		echo $sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->nick = $r['nick'];
			$data->name = $r['name'];
			$data->mail = $r['mail'];
			$data->image = $r['image'];
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


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->nick = $r['nick'];
			$data->name = $r['name'];
			$data->mail = $r['mail'];
			$data->image = $r['image'];
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

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nick = $r['nick'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->mail = $r['mail'];
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->password = $r['password'];
			$array[$cnt]->is_admin = $r['is_admin'];
			$array[$cnt]->is_active = $r['is_active'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllLikeName($username){
		$sql = "select * from ".self::$tablename." where name like '%$username%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nick = $r['nick'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->mail = $r['mail'];
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->password = $r['password'];
			$array[$cnt]->usertype_id = UserTypeData::getById($r['usertype_id']);
			$array[$cnt]->status_id = StatusData::getById($r['status_id']);
			$array[$cnt]->is_admin = $r['is_admin'];
			$array[$cnt]->is_verified = $r['is_verified'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>