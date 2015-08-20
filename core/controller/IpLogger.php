<?php
// IpLogger
// la funcion de esta clase es :
// obtener la ip del cliente que nos esta visitando y conocer si es un visitante
// o es un usuario registrado.
// >>> en caso de ser visitante, su actividad se registrara como visitante
// dicha informacion se eliminara ca 3 dias
// >>> en caso de ser un usuario registrado, se registrara su actividad
// entonces cuando este usuario visite el perfil de otro, solo se apuntara en visitas 1vez cada 24horas.
// la infomacion de usuarios registrados no se eliminara.

class IpLogger {

public static function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) // encaso de que la ip sea compartida
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) // encaso de provenir de un proxy
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}

public static function addImageViewIP($image_id){
	if(Session::getUID()!=""){
		if(!self::verifyIP($image_id)){
		$con = Database::getCon();
		$sql = "insert into image_view (image_id,user_id,realip,created_at) value($image_id,".Session::getUID().",\"".self::getRealIP()."\",".time().")";
		$con->query($sql);
		return $con->insert_id;
		}
	}else {
		if(!self::verifyIP($image_id)){
		$con = Database::getCon();
		$sql = "insert into image_view (image_id,realip,created_at) value($image_id,\"".self::getRealIP()."\",".time().")";
		$con->query($sql);
		return $con->insert_id;
		}
	}
}

public static function getIPLogId($image_id){
	$con = Database::getCon();
 $sql = "select * from image_view where realip=\"".self::getRealIP()."\" and user_id=".Session::getUID()." order by created_at desc limit 1";
	$query = $con->query($sql);
	$ca = 0;
	$id=0;
	while($r=$query->fetch_array()){
//		$found = true ;
		$ca = $r['created_at'];
		$id = $r['id'];
	}
		$found=false;
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=true;
		}

		if($found==true){
			// si es mayor enonces generaremos un id nuevo
			$id = self::addIP();
		}else {

		}
		return array("id"=>$id,"ca"=>$ca);

}

public static function verifyIP($image_id){

	$con = Database::getCon();
	if(Session::getUID()!=""){
	$sql = "select * from image_view where realip=\"".self::getRealIP()."\" and user_id=".Session::getUID()." and image_id=$image_id";
}else{
	$sql = "select * from image_view where realip=\"".self::getRealIP()."\" and image_id=$image_id";	
}
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

}
?>