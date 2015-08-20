<?php

class RecentWidget{
	public function renderChannels($channel_populars){
		if($channel_populars!=null){
			print "<div class='panel panel-default'>";
			print "<div class='panel-heading'>Canales</div>";
			print "<div class='list-group'>";
				foreach($channel_populars as $channel){
					print "<div class='list-group-item'>";
					print "<div class='title'><a href='index.php?module=channel&id=$channel->id'>$channel->title</a></div>";
					print "<a href='#' class='btn btn-default btn-xs pull-right'><i class='glyphicon glyphicon-ok'></i>&nbsp;Seguir</a>";
					print "<br></div>";
				}
			print "</div>";
			print "</div>";
			}

		}

	public function renderImages($image_populars){
		$rows = count($image_populars)/4;
		$m = count($image_populars)%4;
		if($rows>4 && $m!=0){ $rows++; }
		$c=0;
		for($i=0;$i<$rows; $i++){
			echo "<div class='row'>";
			for($j=0;$j<4;$j++){
				if($c<count($image_populars)){
			  		$image = $image_populars[$c];
			        $url = "storage/channel/$image->channel_id/".$image->name;
                    echo <<<AAA
<div class='col-md-3 col-sm-3 col-xs-6'>
	            		<a style='color:#434343;text-transform:capitalize;font-weight:bold;' href='index.php?view=image&id=$image->id'>
						<img class='img-responsive' data-src="holder.js/360x270" src='$url' alt="">
	            		</a>

                    </div>
AAA;
			 }
			 $c++;
			}
			echo "</div>";
		}
		}

		public function renderImageList($image_populars){
			print "<div class='image-widget'>";
			$cnt=0;
			foreach($image_populars as $image){
				$url = "storage/channel/$image->channel_id/".$image->name;
				print "<div class='item'>";
				print "<div class='title roboto'><a href='index.php?module=image&id=<?php echo $image->id;?>'><?php echo $image->title; ?></a></div>";
				print "<img src='$url' class='img-responsive'><br>";
				print "<div class='subtitle roboto'>por <span class='channel'>".$image->getChannel()->title."</span></div>";
				print "</div><br>";
			}
			print "</div>";
		}


}


?>