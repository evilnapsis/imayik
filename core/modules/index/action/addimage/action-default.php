<?php
		$handle = new Upload($_FILES['image']);
    	if ($handle->uploaded) {
    		$url="storage/channel/".$_POST['channel_id'];
        	$handle->Process($url);
        	$image = new ImageData();
        	$image->name = $handle->file_dst_name;
        	$image->title = $_POST['title'];
        	$image->description = $_POST['description'];
        	$image->tags = $_POST['tags'];
        	$image->channel_id = $_POST['channel_id'];
        	$image->privacy_id = $_POST['privacy_id'];
        	$image->add();
			print "<script>window.location='index.php?view=mychannel';</script>";
		}
?>