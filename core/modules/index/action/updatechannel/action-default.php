<?php
			$channel = ChannelData::getById($_POST['channel_id']);
			$channel->title = $_POST['title'];
			$channel->description = $_POST['description'];
			$channel->tags = $_POST['tags'];

			$channel->twurl = $_POST['twurl'];
			$channel->fburl = $_POST['fburl'];
			$channel->gpurl = $_POST['gpurl'];

//			print_r($channel);
//			$channel->user_id = Session::getUID();
			$channel->update();
			print "<script>window.location='index.php?view=channelpanel';</script>";
?>