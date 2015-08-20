<?php
			$channels = ChannelData::getAllByUID(Session::getUID());
			if($channels!=null){
				$channel = $channels[0];
				 $notifications = NotificationData::getAllByChannelId($channel->id);
				 foreach($notifications as $notification){
				 	$notification->del();
				 }
			}
			print "<script>window.location='index.php?view=notifications';</script>";
?>