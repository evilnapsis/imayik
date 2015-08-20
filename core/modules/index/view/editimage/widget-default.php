<?php
$channel = null;
if(Session::getUID()!=""){
$channels = ChannelData::getAllByUID(Session::getUID());
$image = ImageData::getById($_GET['id']);
$channel = $channels[0];
$mine=false;
if($channel->user_id==$image->getChannel()->getUser()->id){
  $mine=true;
}

}
?>

<div class='row'>
<?php if($channel!=null):?>
<?php if($mine==true):?>
  <div class='span6'>
  <h3 class='roboto'>Editar Imagen</h3>

<?php 
  $url = "storage/channel/$image->channel_id/".$image->name;
  echo "<img src='$url'>";
  echo "<br><br><a href='index.php?module=image&id=$image->id' class='btn btn-inverse pull-right'>Ver Imagen</a>";

?>
  </div>
	<div class='span6'>
<br><br><form enctype="multipart/form-data" method='post' action='add.php' class='form-horizontal'  id='form_upload'>

  <div class="control-group" id='title'>
    <label class="control-label" for="inputEmail">Titulo</label>
    <div class="controls">
      <input type="text" name='title' id="input_title" style='width:280px;' placeholder="Titulo de la Imagen" value="<?php echo $image->title;?>">
            <input type="hidden" name='reference' value='updateimage'>
            <input type="hidden" name='image_id' value='<?php echo $image->id; ?>'>

<span class='help-inline' id='title_control'>debes escribir un titulo a la imagen.</span>
    </div>
  </div>
  <div class="control-group" id='description'>
    <label class="control-label" for="inputPassword">Descripcion</label>
    <div class="controls">
    <textarea name='description' style='width:280px;' id='input_description' placeholder='Descripcion de la imagen'><?php echo $image->description; ?></textarea>
<span class='help-inline' id='description_control'>Debes escribir una descripcion a la imagen.</span>
    </div>
  </div>
  <div class="control-group" id='tags'>
    <label class="control-label" for="inputEmail">Etiquetas</label>
    <div class="controls">
      <input type="text" name='tags' id="input_tags" style='width:280px;' placeholder="Etiqueta la imagen : divertido, asombroso, playa" value="<?php echo $image->tags; ?>">
<span class='help-inline' id='tags_control'>Escribe almenos una etiqueta o mas (separadas por comas).</span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Categoria</label>
    <div class="controls">
    <select name='category_id'>
<?php foreach(CategoryData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$image->category_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
<?php endforeach; ?>
    </select>
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="inputEmail">Privacidad</label>
    <div class="controls">
    <select name='privacy_id'>
<?php foreach(PrivacyData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$image->privacy_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
<?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">

      <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
    </div>
  </div>
</form>
<p class='alert alert-info'>La imagen como tal una vez publicada no puede ser modificada, solo la informacion que le corresponde.</p>
	</div>

<?php elseif(Session::getUID()==""):?>
<br><div class='offset2 span8'>
<div class='hero-unit'>
<h2 class='roboto'>No has ingresado</h2>
  <p>Para poder subir imagenes debes <a href='index.php?module=login'>iniciar sesion</a> con tu cuenta YoBup.</p>
  <p>Si aun no tienes una cuenta YoBup entonces <a href='index.php?module=register'>registrate</a> y obtenen una cuenta gratis! </p>
</div>  
</div>
<?php else:?>
<br><div class='span8 offset2'>
  <div class='hero-unit'>
  <h2 class='roboto'>404 Error</h2>
  <p class='roboto'>No se encontro el recurso que buscaba, contacte al administrador si el problema persiste.</p>
  </div>
<br><br><br><br><br><br></div>
<?php endif; ?>
<?php endif;?>
</div>

<script>
title = $("#title");
input_title = $("#input_title");
description = $("#description");
input_description = $("#input_description");
tags = $("#tags");
input_tags = $("#input_tags");

/*input_folio.keypress(function(e){
  if(e.keyCode==48 ||e.keyCode==49 || e.keyCode==50 || e.keyCode==51|| e.keyCode==52|| e.keyCode==53|| e.keyCode==54|| e.keyCode==55|| e.keyCode==56|| e.keyCode==57){

  }else{
  e.preventDefault();    
  }

});*/

      title_control = $("#title_control");
      description_control = $("#description_control");
      tags_control = $("#tags_control");

      title_control.hide();
      description_control.hide();
      tags_control.hide();

$("#form_upload").submit(function(e){
    if(input_title.val()==""|| input_description.val()==""|| input_tags.val()==""){
    e.preventDefault();
    if(input_title.val()==""){
      title.addClass("error");
      title_control.show();
    }else{
      title.removeClass("error");
      title_control.hide();
    }

    if(input_description.val()==""){
      description.addClass("error");
      description_control.show();
    }else{
      description.removeClass("error");
      description_control.hide();
    }
    if(input_tags.val()==""){
      tags.addClass("error");
      tags_control.show();
    }else{
      tags.removeClass("error");
      tags_control.hide();
    }

  }

});

</script>