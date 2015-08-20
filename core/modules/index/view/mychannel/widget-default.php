<?php if(Session::getUID()!=""): ?>
<?php
$channels = ChannelData::getAllByUID(Session::getUID());
// empieza aqui
if($channels!=null):
$channel = $channels[0];
$images = ImageData::getAllByChannel($channel->id);
$im = null;
if($images!=null){$im = $images[0];}
?>

	<div class='row'>

		<div class="col-md-12">
		<?php 
		ChannelWidget::renderMyHeader($channel);
		if(count($images)>0):
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
          $likes = count($image->getLikes());
          $views = count($image->getViews());

            ?>
<?php
			$url = "storage/channel/$image->channel_id/".$image->name;
echo <<<AAA
<div class='col-md-3 col-sm-3 col-xs-6'>
                  <a style='color:#434343;text-transform:capitalize;font-weight:bold;' href='index.php?view=image&id=$image->id'>
            <img class='img-responsive' data-src="holder.js/360x270" src='$url' alt="">
                  </a>
            <br><div class='counts'>
              <div class='count btn btn-default btn-xs'> $likes&nbsp;<i class='fa fa-thumbs-up'></i></div>
              <div class='count btn btn-default btn-xs'>  $views&nbsp;<i class='fa fa-eye'></i></div>
            </div>

                    </div>
AAA;
			 ?>
		<?php 
    }
    $c++;
}
echo "</div>";
}

     ?>

		<?php else:?>
			<br><div class='hero-unit'>
				<div class='roboto' style='font-size:28px;font-weight:bold;'>No has publicado imagenes</div>
				<p class='roboto'>Debes subir imagenes para que se muestre tu actividad</p>
			</div>
			<br><br><br><br><br><br><br>
		<?php endif;?>
		
		</div>

	</div><!-- /container -->
<?php else:?>
	<div class='row'>
	<div class='col-md-3'>

	</div>
	<div class='col-md-6'>
	<h2 class='roboto'>Crea tu Canal</h2>
  <p><b>Crea tu canal</b>: tu canal es el punto de partida para empezar a compartir tus fotos/imagenes con tus amigos o el publico en general ...</p>


<form role="form" method="post" action="index.php?action=addchannel">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="title" required class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <textarea name="description" class="form-control" id="exampleInputEmail1" placeholder="Descripcion"></textarea>
  </div>

  <button type="submit" class="btn btn-default">Crear Canal</button>
</form>

	</div>
	</div>

<?php endif; // en caso de que el usuario es nuevo ?>
<?php else:?>
<br>	<div class='hero-unit'>
			<h2 class='roboto'>No has iniciado session</h2>
			<p class='roboto'>Debes iniciar sesion para poder acceder a tu canal, tus seguidores, tus notificaciones y responder comentarios.</p>
			<p class='roboto'>Si no tienes una cuenta Yobup puedes obtener una totalmente gratis <a href='index.php?view=register'>AQUI</a></p>
			<a href='index.php?view=login' class='btn btn-info btn-large pull-right'>Iniciar Sesion</a>
		</div>
		<br><br><br><br>
		<br><br>
<?php endif;?>
