<?php

			$like = new IsLikeData();
			$like->is_like = $_GET["l"];
			$like->image_id = $_GET['id'];
			$like->user_id = Session::getUID();
			$like->add();
//print_r($_GET);
			$text = "";

			$u = UserData::getById(Session::getUID());
			$image = ImageData::getById($_GET['id']);
if($_GET["l"]==1){ 
	$not_type = NotificationTypeData::getByName("Nuevo Like");
	$text = "A <b>$u->name $u->lastname</b> le ha gusta tu imagen.";
}
else if($_GET["l"]==0){ 
	$not_type = NotificationTypeData::getByName("Nuevo DisLike");
	$text = "A <b>$u->name $u->lastname</b> NO le ha gusta tu imagen.";
}
			$n = new NotificationData();
			$n->brief= $text;
			$n->content = "";
			$n->channel_id=$image->channel_id;
			$n->image_id=$_GET['id'];
			$n->comment_id ="NULL";
			$n->album_id="NULL";
			$n->notification_type_id=$not_type->id;
			$n->user_id=Session::getUID();
//print_r($n);
			$n->add();

			print "<script>window.location='index.php?view=image&id=$_GET[id]';</script>";
?>