<?php
class Viewer {

	public static function addView($servid,$field,$table){
		if(UserLogged::isLogged()){

			if(self::checkView($servid,$field,$table)==true){
				$con = Database::getCon();
				$tim = time();			
					$sql = "insert into $table (user_id, $field,realip,created_at) value (".Session::getUID().",$servid,\"".IpLogger::getRealIP()."\",$tim)";
				if($con->query($sql)){
					return true;
				}else{
					return false;
				}
			}

		}else{
			if(self::checkView($servid,$field,$table)==true){
				$con = Database::getCon();
				$tim = time();
				$sql = "insert into $table ($field,realip,created_at) value ($servid,\"".IpLogger::getRealIP()."\",$tim)";
				if($con->query($sql)){
					return true;
				}else{
					return false;
				}
			}
		}
	}

public static function countIt($servid,$field,$table){
	$con = Database::getCon();
	$sql = "select count(*) as c  from $table where $field=".$servid;
	$c = 0;
	$query = $con->query($sql);
	while($r=$query->fetch_array()){				
		$c = $r['c'];
		}
	return $c;

}

	public static function checkView($servid,$field,$table){
		// vamos a verficar que no se haya visto el servicio en un lapso de tiempo
		$con = Database::getCon();
//		$sql = "select serviceview.id as svid, iplog.id as ilid serviceview inner join iplog on (serviceview.iplog_id=iplog.id) where $field=$servid and order by created_at desc limit 1";
		$sql = "select * from $table where realip='".IpLogger::getRealIP()."' and $field='$servid' order by created_at desc limit 1";

		$query = $con->query($sql);
		$found=false;
		$ca = 0;
		while($r=$query->fetch_array()){
			$found=true;
			$ca = $r['created_at'];
		}
if($found==true){
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=false;
		}
	}

		if($found==false){
			return true;
		}else{
			return false;
		}
	}

}

?>