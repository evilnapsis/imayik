<?php
?>
	<h3 class='roboto'>Imagen de Perfil</h3>
<?php if($u->image==""):?>
  <br>
<form enctype="multipart/form-data" method='post' action='add.php' class='form-horizontal'  id='form_upload'>
  <div class="control-group">
    <label class="control-label" for="inputEmail"></label>
    <div class="controls">
      <input type="file" name='image' id="inputEmail" placeholder="Email" required>
      <input type="hidden" name='reference' value='adduserimage'>
    </div>
  </div>  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Agregar Imagen de Perfil</button>
    </div>
  </div>
</form>
<br><br><br><br><br>
<?php else:?>
  <?php 
  $url = "storage/user/".$u->id."/".$u->image;
  echo "<img src='$url'>";
  ?>
<br><br>
<p class='alert alert-info'>Esta imagen de perfil se usa para tu actividad e interaccion con las imagenes y los otros canales.</p>
<form  method='post' action='add.php' class='form-horizontal'  id='form_upload'>
      <input type="hidden" name='reference' value='deluserimage'>
      <input type='submit' value='Eliminar Imagen' class='btn btn-danger pull-right'>
</form>  
<?php endif; ?>
