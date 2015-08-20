	<div class='row'>
<?php 
$channels = ChannelData::getAll();
$images = ImageData::getAll();
$resultados=ImageViewData::getSearch($_GET['q']);
$im=null;
$url = null;
if(count($resultados)>0){ 
	$im = $resultados[0]->getImage();
	$url = "storage/channel/$im->channel_id/".$im->name;
}
?>

		<div class="col-md-12">
			<h1 class='roboto'>Buscar: <?php echo $_GET['q']; ?></h1>
			<?php if($url!=null):?>
<hr><?php foreach($resultados as $resultado){
	$image = $resultado->getImage();
			$url = "storage/channel/$image->channel_id/".$image->name;
echo <<<AAA
		<ul class="row">
            <li class="col-md-4">
                <img data-src="holder.js/360x270" class='img-responsive' src='$url' alt="">
            </li>
            <li class="col-md-8">

<div class="btn-group pull-right">
  <a class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" href="#">
    <i class='glyphicon glyphicon-ok'></i>
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
  <li><a href='index.php?module=del&image=$image->id'>Agregar a Favoritos</a></li>
  <li><a href='index.php?module=del&image=$image->id'>Agregar a un Album</a></li>
  <li><a href='index.php?module=del&image=$image->id'>Reportar ...	</a></li>
  </ul>
</div>

            <div class='f28 roboto'><a href='index.php?module=image&id=$image->id'>$image->title</a></div>
<div class='pull-right'><span class='label'>$image->created_at</span></div>
            <p class='roboto'>$image->description</p>

            </li>
          </ul>
          <hr>
AAA;
			 }
	 ?>
			<?php else: ?>
				<div class='hero-unit'>
				<h2 class='roboto'>No hay resultados</h2>
				<p>La busqueda que realizaste no proporciono resultados, intenta de nuevo.</p>
					
				</div>
			<?php endif; ?>


		</div>

	</div><!-- /container -->
