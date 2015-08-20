<?php


// 13 de Octubre del 2014
// Session.php
// @brief esto es algo mucho mas magico

class Session {
	function __get($value){
		if(!$this->exist($value)){
			print "<b>SESSION ERROR</b> El parametro <b>$value</b> que intentas llamar no existe!";
			die();
		}
		return $_SESSION[$value];
	}

	public static function getUID(){
//		$_SESSION["user_id"]=1;
		if(isset($_SESSION["user_id"])){
			return $_SESSION["user_id"];
		}
		return null;
	}

	function  exist($value){
		$found = false;
		if(isset($_SESSION[$value])){
			$found=true;
		}
		return $found;
	}
}



?>