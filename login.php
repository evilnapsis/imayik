<?php

define('LBROOT',getcwd()); // LegoBox Root ... the server root
include("core/controller/Database.php");
include("core/controller/Executor.php");
include("core/controller/Model.php");
include("core/modules/index/model/UserData.php");

$user = $_POST['mail'];
$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();
 $sql = "select * from user where (email= \"".$user."\" and password= \"".$pass."\") or (nick= \"".$user."\" and password= \"".$pass."\") ";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id'];
}

if($found==true) {
	session_start();
//	print $userid;
	$_SESSION['user_id']=$userid ;
//	setcookie('userid',$userid);
//	print $_SESSION['userid'];
	print "Cargando ... $user";
	$u=UserData::getById($userid);
	if($u->image==""){
		print "<script>window.location='./index.php?view=mychannel';</script>";		
	}
	print "<script>window.location='./index.php?view=mychannel';</script>";
}else {
	print "<script>window.location='index.php?view=login';</script>";
}
?>