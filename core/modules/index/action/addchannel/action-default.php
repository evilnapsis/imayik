<?php
$channel = new ChannelData();
			$channel->title = $_POST['title'];
			$channel->description = $_POST['description'];
			$channel->user_id = Session::getUID();
			$channel->add();
			print "<script>window.location='index.php?view=mychannel';</script>";

			?>