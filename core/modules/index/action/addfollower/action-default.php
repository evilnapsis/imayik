<?php

			$f = new FollowerData();
			$f->channel_id = $_POST['channel_id'];
			$f->add();


			$u = UserData::getById(Session::getUID());
$channel = ChannelData::getById($_POST['channel_id']);
$author = $channel->getUser();


			$not_type = NotificationTypeData::getByName("Nuevo Seguidor");
			$n = new NotificationData();
			$n->brief="<b>$u->name $u->lastname</b> Te Sigue";
			$n->content = "";
			$n->channel_id=$_POST['channel_id'];
			$n->image_id="NULL";
			$n->comment_id ="NULL";
			$n->album_id="NULL";
			$n->notification_type_id=$not_type->id;
			$n->user_id=Session::getUID();
			$n->add();
			//index.php?module=channelinfo&id=1
		print "<script>window.location='index.php?view=channelinfo&id=$_POST[channel_id]';</script>";




?>