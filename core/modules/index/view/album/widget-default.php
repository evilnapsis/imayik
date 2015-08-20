<?php
$album = AlbumData::getById($_GET['id']);

$images  = $album->getImages();
?>

<div class='row'>
<?php if($album!=null):?>
<div class='span7'>
	<h2><?php echo $album->title; ?></h2>
	<p><?php echo $album->description; ?></p>
<br>
<?php if(count($images)>0):?>

<?php 
$count_images = count($images);
			$filas = $count_images / 4;
			$resto = $count_images %4;
			if($resto>0){$filas++;}

$counter=0; for($i=0;$i<$filas;$i++):?>
<div class='row'>
<?php for($j=0;$j<4;$j++):?>
<div class='span3'>
<?php if($counter<$count_images):
 if(($image=$images[$counter])!=null):
 	$image = $image->getImage();
print "<h4><a href='index.php?module=image&id=$image->id'>$image->title</a></h4>";
print "<img src='".$image->getFullPath()."'>";
?>
<?php endif;?>
<?php endif;?>

</div>
<?php $counter++; endfor;?>
</div>
<?php endfor;?>





<?php else:?>
<div class='hero-unit'>
	<h2>No hay imagenes</h2>
	<p>El album en el que se encuentra actualmente no contiene imagenes.</p>
</div>
<?php endif;?>
</div>
<div class='span5'></div>
<?php else: ?>
<div class='span8 offset2'>
	<div class='hero-unit'>
		<h2>El Album no Existe</h2>
	</div>
</div>
<?php endif; ?>
</div>

