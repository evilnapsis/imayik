	<div class='row'>
<?php 
$image_populars = 			$uac = FollowerData::getUserIdActivity(Session::getUID());
?>
		<div class="col-md-12">
			<?php if(count($image_populars)>0):?>
			<h2 class='roboto'>Actividad <small>Actualizaciones de los canales que siguies</small></h2>
<br>
			  		<?php foreach($image_populars as $activity){
			  			$image=$activity->getImage();

			$url = "storage/channel/$image->channel_id/".$image->name;
			$chan = $image->getChannel();
			
			$chanurl = "storage/channel/$image->channel_id/profile/".$chan->image;
			$chanimg="";
			if($image->getChannel()->image!=""){$chanimg = "<img src='$chanurl'>";} 
			else{ $chanimg = "<img data-src='holder.js/64x64'>"; }
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
	 ?>

			<?php else: ?>
				<br><div class='jumbotron'>
					<h2 class='roboto'>No hay actividad</h2>
					<p class='roboto'>No se pueden cargar imagenes porque aun no sigues a nadie, debes seguir los canales que te gustan para recivir sus actualizaciones en esta seccion.</p>
				</div>
			<?php endif; ?>
		</div>
				<div class='col-md-2'>
		</div>

	</div><!-- /container -->
