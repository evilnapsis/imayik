<?php
$channel = null;
if(Session::getUID()!=""){
$channels = ChannelData::getAllByUID(Session::getUID());
$channel = $channels[0];
}
?>

<div class='row'>
<?php if($channel!=null):?>
	<div class='span6'>
	<h3 class='roboto'>Crear Album</h3>
<form enctype="multipart/form-data" method='post' action='add.php' class='form-horizontal'  id='form_upload'>


  <div class="control-group" id='title'>
    <label class="control-label" for="inputEmail">Titulo</label>
    <div class="controls">
      <input type="text" name='title' id="input_title" style='width:280px;' placeholder="Titulo de el Album">
      <input type="hidden" name='reference' value='addalbum'>
      <input type="hidden" name='channel_id' value='<?php echo $channel->id;?>'>
<span class='help-inline' id='title_control'>Debes escribir un titulo a el Album.</span>
    </div>
  </div>
  <div class="control-group" id='description'>
    <label class="control-label" for="inputPassword">Descripcion</label>
    <div class="controls">
    <textarea name='description' style='width:280px;' id='input_description' placeholder='Descripcion de el Album'></textarea>
<span class='help-inline' id='description_control'>Debes escribir una descripcion al Album.</span>
    </div>
  </div>
  <div class="control-group" id='tags'>
    <label class="control-label" for="inputEmail">Etiquetas</label>
    <div class="controls">
      <input type="text" name='tags' id="input_tags" style='width:280px;' placeholder="Etiqueta en album : divertido, asombroso, playa">
<span class='help-inline' id='tags_control'>Escribe al menos una etiqueta o mas (separadas por comas).</span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="inputEmail">Privacidad</label>
    <div class="controls">
    <select name='privacy_id'>
<?php foreach(PrivacyData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
<?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">

      <button type="submit" class="btn btn-primary">Crear Album</button>
    </div>
  </div>
</form>
	</div>
  <div class='span6'>
<br><img id="uploadPreview" style="width: 50%;display:none;" />
<script type="text/javascript">

    function PreviewImage() {
        $("#uploadPreview").show("slow");
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
  </div>
<?php elseif(Session::getUID()==""):?>
<br><div class='offset2 span8'>
<div class='hero-unit'>
<h2 class='roboto'>No has ingresado</h2>
  <p>Para poder subir imagenes debes <a href='index.php?module=login'>iniciar sesion</a> con tu cuenta YoBup.</p>
  <p>Si aun no tienes una cuenta YoBup entonces <a href='index.php?module=register'>registrate</a> y obtenen una cuenta gratis! </p>
</div>  
</div>
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