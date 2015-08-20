	<h1 class='roboto'><?php echo $channel->title;?> <small>Informacion</small></h1>

    <a class="btn btn-default" href='index.php?view=channelpanel'>Configuracion</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=image2'>Imagen de Canal</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=followers'>Seguidores</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=comments'>Comentarios</a>

		<form class="form-horizontal" method='post' action='index.php?action=updatechannel'>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Titulo</label>
    <div class="controls">
      <input type="text" class="form-control" name='title' id="inputEmail" placeholder="Titulo del canal" value="<?php echo $channel->title;?>">
    </div>
  </div>
 
  <div class="control-group">
    <label class="control-label" for="inputEmail">Descripcion</label>
    <div class="controls">
    <textarea class="form-control" name='description' placeholder='Descripcion del canal' class='roboto'><?php echo $channel->description;?></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Etiquetas</label>
    <div class="controls">
      <input type="text" class="form-control" name='tags' value="<?php echo $channel->tags;?>" id="inputEmail" placeholder="Email">
    </div>
  </div>
 <hr>
 <h3 class='roboto'>Links Sociales</h3>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Twitter</label>
    <div class="controls">
      <input type="text" class="form-control" name='twurl' id="inputEmail" placeholder="Direccion Twitter" value="<?php echo $channel->twurl;?>">
    </div>
  </div>
<div class="control-group">
    <label class="control-label" for="inputEmail">Facebook</label>
    <div class="controls">
      <input type="text" class="form-control" name='fburl' id="inputEmail" placeholder="Direccion Facebook" value="<?php echo $channel->fburl;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Google Plus</label>
    <div class="controls">
      <input type="text" class="form-control" name='gpurl' id="inputEmail" placeholder="Direccion Google Plus" value="<?php echo $channel->gpurl;?>">
    </div>
  </div>

<br>
  <div class="control-group">
    <div class="controls">
    <input type='hidden' name='reference' value='updatechannel'>
    <input type='hidden' name='channel_id' value='<?php echo $channel->id; ?>'>
      <button type="submit" class="btn btn-primary btn-large">Actualizar Informacion</button>
    </div>
  </div>
</form>
