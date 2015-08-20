<?php
?>
	<h1 class='roboto'>Imagen de Canal</h1>
    <a class="btn btn-default" href='index.php?view=channelpanel'>Configuracion</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=image2'>Imagen de Canal</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=followers'>Seguidores</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=comments'>Comentarios</a>
<?php if($channel->image==""):?>
  <br>
<form enctype="multipart/form-data" method='post' action='index.php?action=addchannelimage' class='form-horizontal'  id='form_upload'>
  <div class="control-group">
    <label class="control-label" for="inputEmail"></label>
    <div class="controls">
      <input type="file" name='image' id="inputEmail" placeholder="Email" required>
      <input type="hidden" name='reference' value='addchannelimage'>
      <input type="hidden" name='channel_id' value='<?php echo $channel->id; ?>'>
    </div>
  </div>  
  <br>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Agregar Imagen de Canal</button>
    </div>
  </div>
</form>
<br><br><br><br><br>
<?php else:?>
  <?php 
  $url = "storage/channel/".$channel->id."/profile/".$channel->image;
  echo "<img src='$url'>";
  ?>
<br><br>
<form  method='post' action='index.php?action=delchannelimage' class='form-horizontal'  id='form_upload'>
      <input type="hidden" name='reference' value='delchannelimage'>
      <input type="hidden" name='channel_id' value='<?php echo $channel->id; ?>'>
      <input type='submit' value='Eliminar Imagen' class='btn btn-danger pull-right'>
</form>  
<?php endif; ?>
