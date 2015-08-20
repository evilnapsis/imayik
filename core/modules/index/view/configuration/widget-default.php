<?php
$u = Core::$user;

?>
<br><div class='row'>
<div class='col-md-4'>
<ul class="nav nav-tabs nav-stacked">
<li><a href='index.php?module=configuration'>Basica</a></li>
<li><a href='index.php?module=configuration&action=image1'>Imagen de Perfil</a></li>
<li><a href='index.php?module=configuration&action=security'>Seguridad</a></li>
</ul>
</div>
<div class='col-md-8'>
<?php if($u->image==""){ echo "<p class='alert alert-info'>No has colocado una imagen de perfil de usuario, te recomendamos hacerlo.</p>"; }?>
<?php
if(!isset($_GET['action'])){
	include "actions/_index_.php";
}else {
	$action = $_GET['action'];
	if($action!="index" && $action!="security"&& $action!="image1"){
	}else {
		include "actions/_".$action."_.php";		
	}
}
?>
</div>
</div>
<br><br><br><br>