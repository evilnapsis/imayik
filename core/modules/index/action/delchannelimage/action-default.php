<?php

        	$channel =ChannelData::getById($_POST['channel_id']);
        	$channel->image = "";
        	$channel->update();
			print "<script>window.location='index.php?view=channelpanel&part=image2';</script>";


?>