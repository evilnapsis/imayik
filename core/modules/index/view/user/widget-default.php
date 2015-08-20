<?php 
$user = UserData::getById($_GET['id']);

if($user!=null):
$url = "storage/user/$user->id/$user->image";
?>
<br><div class='row'>
	<div class='col-md-4'>
<div class="media">
  <a class="pull-left" href="#">
<?php if($user->image==""):?>
    <img class="media-object" data-src="holder.js/64x64">
<?php else:?>
    <img class="media-object" data-src="holder.js/64x64" src='<?php echo $url; ?>' style='width:64px;height:64px;'>	
<?php endif; ?>
  </a>
  <div class="media-body">
    <div class="f28 roboto media-heading"><?php echo "$user->name $user->lastname";?></div>
<br>	<p class='alert alert-info'>Te mostramos las imagenes que le gustan a este usuario.</p>
 
  </div>
</div>


	</div>
	<div class='col-md-8'>
<br><br><br><?php 
$likeds=$user->getLiked();
if(count($likeds)>0){
foreach($likeds as $liked){
	$image = $liked->getImage();
			$url = "storage/channel/$image->channel_id/".$image->name;
echo <<<AAA
		<ul class="row">
            <li class="col-md-4">
                <img data-src="holder.js/360x270" class='img-responsive' src='$url' alt="">
            </li>
            <li class="col-md-8">

<div class="btn-group pull-right">
  <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
    <i class='icon-ok'></i>
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
		}else{
			echo "<div class='hero-unit'><h2 class='roboto'>No hay Actividad</h2><p class='roboto'>Este usuario aun no ha creado actividad que pueda ser mostrada.</p></div>";
		}
	 ?>
	</div>

</div>
<?php else:?>
<br><div class='row'>
<div class='span8 offset2'>
	<div class='hero-unit'>
		<h2 class='roboto'>No se encontro usuario</h2>
		<p class='roboto'>El usuario que esta buscando no existe o la informacion no esta disponible en este momento, favor intenta despues.</p>
	</div>
	</div>

</div>
	<?php endif; ?>