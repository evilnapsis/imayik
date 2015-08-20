<div class='row'>
<div class='span8'>
<?php if(Session::getUID()!=""): ?>
<?php
$channels = ChannelData::getAllByUID(Session::getUID());
// empieza aqui
if($channels!=null):
$channel = $channels[0];
$albums = $channel->getAlbums();
?>
<h2 class='roboto'><?php echo $channel->title; ?> <small><?php if(($calbums=count($albums))==1){ echo "$calbums Album";} else {{ echo "$calbums Albumes";}}?></small></h2>
<br><?php if($calbums>0):?>
<?php foreach($albums as $album):?>
<div class='row'>
	<div class='span1'>    <img class="media-object" data-src="holder.js/64x64">
</div>
	<div class='span7'>
<div class="btn-group pull-right">
  <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
    <i class='fa fa-cog'></i>
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
  <li><a href=''>Agregar Imagen</a></li>
  <li><a href=''>Modificar album</a></li>
  </ul>
</div>
    <h4 class="media-heading"><a href='index.php?module=album&id=<?php echo $album->id; ?>' style='color:#000;text-decoration:none;'><?php echo $album->title; ?></a></h4>
    <p><?php echo $album->description; ?></p>
<a href=''><?php echo count($album->getImages()); ?> <i class='fa fa-camera'></i></a>

	</div>
</div>
<hr>
<?php endforeach; ?>
<?php else:
// no hay albums
?>
<?php endif;?>

<?php

else:
	// el canal no e
endif;


?>
<?php else:
// usuario no logeado
?>

<?php endif; ?>
</div>
</div>