	<div class='row'>

<?php 
$channel_populars = ChannelData::getAll();
$image_populars = ImageData::getAll();
$im=null;
$url=null;
if($image_populars!=null){
	$im = $image_populars[0];
	$url = "storage/channel/$im->channel_id/".$im->name;
}
// RecentWidget::renderChannels($channel_populars);
?>	
		<div class="col-md-12">
			<h2 class='roboto'>Recientes <small>Las mas nuevas</small></h2>
			<?php if($url!=null):?>
				<?php
			RecentWidget::renderImages($image_populars);
			 else: ?>
				<div class='hero-unit'>
					<h2 class='roboto'>No hay imagenes</h2>
					<p class='roboto'>No se ha cargado imagenes al sistema</p>
				</div>
			<?php endif; ?>
		</div>
				<!-- <div class='col-md-2'>
				<br><h4 class='roboto'>Populares</h4>
<?php // RecentWidget::renderImageList($image_populars); ?>
		</div> -->

	</div><!-- /container -->
