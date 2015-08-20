<?php

		$handle = new Upload($_FILES['image']);
    	if ($handle->uploaded) {
    		$url="storage/channel/".$_POST['channel_id']."/profile/";
        	$handle->Process($url);
        	$channel =ChannelData::getById($_POST['channel_id']);
        	$channel->image = $handle->file_dst_name;
        	$channel->update();
        	print_r($channel);
			print "<script>window.location='index.php?view=channelpanel&part=image2';</script>";
		}


?>