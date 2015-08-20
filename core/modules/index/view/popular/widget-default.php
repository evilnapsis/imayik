	<div class='row'>

<?php 
$channel_populars = FollowerData::getAllByPopular();
$image_populars = ImageViewData::getAllByPopular();
$channels = ChannelData::getAll();
$images = ImageData::getAll();

?>
		<div class="col-md-12">
			<h2 class='roboto'>Populares <small>Las mas vistas</small></h2>
			<?php if(count($image_populars)>0):
			Widget::renderPopularImages($image_populars);
			else: ?>
				<div class='hero-unit'>
					<h2 class='roboto'>No hay imagenes</h2>
					<p class='roboto'>No se ha cargado imagenes al sistema</p>
				</div>
			<?php endif; ?>
		</div>
				<!-- <div class='col-md-2'>
				<br><h4 class='roboto'>Populares</h4>
<?php// Widget::renderPopularimageList($image_populars); ?>
		</div> -->

	</div><!-- /container -->
