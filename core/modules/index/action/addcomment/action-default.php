<?php
			$comment = new CommentData();
			$comment->content = $_POST['content'];
			$comment->image_id = $_POST['image_id'];
			$comment->user_id = Session::getUID();
			$comment->add();

			$not_type = NotificationTypeData::getByName("Nuevo Comentario");
			$u = UserData::getById(Session::getUID());
			$image = ImageData::getById($_POST['image_id']);

			$n = new NotificationData();
			$n->brief="<b>$u->name $u->lastname</b> Te ha agregado un nuevo comentario.";
			$n->content = "";
			$n->channel_id=$image->channel_id;
			$n->image_id=$_POST['image_id'];
			$n->comment_id ="NULL";
			$n->album_id="NULL";
			$n->notification_type_id=$not_type->id;
			$n->user_id=Session::getUID();
			$n->add();

			print "<script>window.location='index.php?view=image&id=$_POST[image_id]';</script>";


?>