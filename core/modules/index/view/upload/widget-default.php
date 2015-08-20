<?php
$channel = null;
if(Session::getUID()!=""){
$channels = ChannelData::getAllByUID(Session::getUID());
$channel = $channels[0];
}
?>

<div class='row'>
<?php if($channel!=null):?>
	<div class='col-md-8'>
<h1>Subir Imagen </h1>
<form enctype="multipart/form-data" method='post' action='index.php?action=addimage' class='form-horizontal'  id='form_upload'>

  <div class="control-group row">
    <label class="control-label col-md-4" for="inputEmail"></label>
    <div class="controls col-md-8">
      <input type="file" name='image' id="uploadImage" placeholder="Email" onchange="PreviewImage();" required>
      <input type="hidden" name='reference' value='addimage'>
      <input type="hidden" name='channel_id' value='<?php echo $channel->id;?>'>
    </div>
  </div>
<br>
  <div class="control-group row" id='title'>
    <label class="control-label col-md-4" for="inputEmail">Titulo</label>
    <div class="controls col-md-8">
      <input type="text" class='form-control' name='title' id="input_title" style='width:280px;' placeholder="Titulo de la Imagen">
    </div>
  </div><br>
  <div class="control-group row" id='description'>
    <label class="control-label col-md-4" for="inputPassword">Descripcion</label>
    <div class="controls col-md-8">
    <textarea name='description' class="form-control" style='width:280px;' id='input_description' placeholder='Descripcion de la imagen'></textarea>
    </div>
  </div><br>
  <div class="control-group row" id='tags'>
    <label class="control-label col-md-4" for="inputEmail">Etiquetas</label>
    <div class="controls col-md-8">
      <input type="text" class="form-control" name='tags' id="input_tags" style='width:280px;' placeholder="Etiqueta la imagen : divertido, asombroso, playa">
    </div>
  </div><br>
<!--  <div class="control-group row">
    <label class="control-label col-md-4" for="inputEmail">Categoria</label>
    <div class="controls col-md-4">
    <select name='category_id' class="form-control">
<?php foreach(CategoryData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
<?php endforeach; ?>
    </select>
    </div>
  </div>  <br>
  -->
  <div class="control-group row">
    <label class="control-label col-md-4" for="inputEmail">Privacidad</label>
    <div class="controls col-md-4">
    <select name='privacy_id' class="form-control">
<?php foreach(PrivacyData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
<?php endforeach; ?>
    </select>
    </div>
  </div>
<br>
  <div class="control-group">
    <div class="controls row">
      <button type="submit" class="btn col-md-offset-4 col-md-4 btn-primary">Agregar Imagen</button>
    </div>
  </div>
</form>
	</div>
  <div class='col-md-4'>
<br><br><img id="uploadPreview" class="img-responsive" style="display:none;width:100px;height:100px;" />
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
