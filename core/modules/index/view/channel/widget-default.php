<?php
$channel = ChannelData::getById($_GET['id']);
$images = ImageData::getAllByChannel($channel->id);
$im = null;
?>

	<div class='row'>

		<div class="col-md-12">
		<?php if(count($images)>0):
//////////////////////////
ChannelWidget::renderHeader($channel);
//////////////////////////
		?>
			  		<?php

		$rows = count($images)/4;
		$m = count($images)%4;
		if($rows>4 && $m!=0){ $rows++; }
		$c=0;
		for($i=0;$i<$rows; $i++){
			echo "<div class='row'>";
			for($j=0;$j<4;$j++){
				if($c<count($images)){
			  		$image = $images[$c];
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
	 ?>

		<?php else:?>
			<h1 class='roboto'><?php echo $channel->title;?></h1>
				<div class='roboto' style='font-size:28px;font-weight:bold;'>No hay imagenes</div>
				<p class='roboto'>El propietario de este canal aun no ha publicado imagenes.</p>
			<br><br><br><br><br><br><br>
		<?php endif;?>
		
		</div>
				

	</div><!-- /container -->
