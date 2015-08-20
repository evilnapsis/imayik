<?php


class ProfileViewData {
	public static $tablename = "profileview";
	public function ProfileViewData(){
		$this->viewer_id = "";
		$this->profile_id = "";
		$this->realip = "";
		$this->created_at = "";
	}

	public function add(){
		// $sql = "insert into user (viewer_id,profile_id,created_at,realip) ";
		// $sql .= "value ($this->viewer_id,$this->profile_id,$this->created_at,$this->realip)";

/////////////////////////////////
	if(Session::getUID()!=""){
		if(!$this->verify()){
			$sql = "insert into ".self::$tablename." (viewer_id,profile_id,created_at,realip) ";
			$sql .= "value ($this->viewer_id,$this->profile_id,$this->created_at,\"$this->realip\")";
			Executor::doit($sql);
		// return $con->insert_id;
		return true;
		}
	}else {
		return false;
	}

/////////////////////////////////
	}

public static function countByProfileId($profile_id){
	$sql = "select count(*) from ".self::$tablename." where profile_id=$profile_id";
	$q = Executor::doit($sql);
	$r = $q->fetch_array();
	return $r[0];// print_r($r);	
}

public function verify(){
	$con = Database::getCon();
	$sql = "select * from ".self::$tablename." where realip=\"".IpLogger::getRealIP()."\" and viewer_id=".Session::getUID();
	$query = $con->query($sql);
	$found=false;
	$ca = "" ;
	while($r=$query->fetch_array()){
		$found = true ;
		$ca = $r['created_at'];
	}

	if($found==true){
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=false;
		}
	}
	return $found;
}



	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProfileViewData previamente utilizamos el contexto
	public function update(){
	}

/*	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ProfileViewData();
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


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ProfileViewData();
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

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new ProfileViewData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nick = $r['nick'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->mail = $r['mail'];
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
*/
}

?>