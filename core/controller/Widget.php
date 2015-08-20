<?php

class Widget{
	public function renderPopularChannels($channel_populars){
		if($channel_populars!=null){
			print "<div class='channel-widget'>";
				foreach($channel_populars as $channel_popular){
					$channel = $channel_popular->getChannel();
					print "<div class='item'>";
					print "<div class='title'><a href='index.php?view=channel&id=$channel->id'>$channel->title</a></div>";
					print "<a href='#' class='btn btn-mini pull-right'><i class='icon-ok'></i>&nbsp;Seguir</a>";
					print "</div><br>";
				}
			print "</div>";
			}

		}

	public function renderPopularImages($image_populars){
		$rows = count($image_populars)/4;
		$m = count($image_populars)%4;
		if($rows>4 && $m!=0){ $rows++; }
		$c=0;
		for($i=0;$i<$rows; $i++){
			echo "<div class='row'>";
			for($j=0;$j<4;$j++){
				if($c<count($image_populars)){
			  		$image = $image_populars[$c]->getImage();
			        $url = "storage/channel/$image->channel_id/".$image->name;
					$likes = count($image->getLikes());
					$views = count($image->getViews());
                    echo <<<AAA
                    <div class='col-md-3 col-sm-3 col-xs-6'>
	            		<a style='color:#434343;text-transform:capitalize;font-weight:bold;' href='index.php?view=image&id=$image->id'>
						<img class='img-responsive' data-src="holder.js/360x270" src='$url' alt="">
	            		</a>
						<br><div class='counts'>
							<div class='count btn btn-default btn-xs'> $likes&nbsp;<i class='fa fa-thumbs-up'></i></div>
							<div class='count btn btn-default btn-xs'>	$views&nbsp;<i class='fa fa-eye'></i></div>
						</div>

                    </div>
AAA;
}
			 $c++;
			 }
			 echo "</div>";
			}
		}
		

		public function renderPopularImageList($image_populars){
			print "<div class='image-widget'>";
			$cnt=0;
			foreach($image_populars as $image_popular){
				$image = $image_popular->getImage();
				$url = "storage/channel/$image->channel_id/".$image->name;
				print "<div class='item'>";
				print "<div class='title roboto'><a href='index.php?view=image&id=<?php echo $image->id;?>'><?php echo $image->title; ?></a></div>";
				print "<img src='$url' class='img-responsive'><br>";
				print "<div class='subtitle roboto'>por <span class='channel'>".$image->getChannel()->title."</span></div>";
				print "</div>";
			}
			print "</div>";
		}


}


?>