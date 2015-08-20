<?php
$channel = ChannelData::getById($_GET['id']);
// aui empieza ...
if($channel!=null):
$images = ImageData::getAllByChannel($channel->id);
$followers = FollowerData::getByChannelId($_GET['id']);

$url="";
$background="";
if($channel->image!=""){ $url = "storage/channel/$channel->id/profile/$channel->image"; }
if($url!=""){
	$background="style='background: url($url) center;'";
}
$f=null;
if(Session::getUID()!=""){
$f = FollowerData::existFollowerChannel(Session::getUID(),$channel->id);
}
?>

<br>	<div class='row'>
		<div class="col-md-12">
				<h1 class='roboto'><?php echo $channel->title;?></h1>
				<p class="lead"><?php echo $channel->description;?></p>
<?php if($f==null):?>
				<form method="post" action="index.php?action=addfollower">
				<input type='hidden' name='reference' value='addfollower'>
				<input type='hidden' name='channel_id' value='<?php echo $channel->id; ?>'>
<?php if(Session::getUID()!=""):?>
				<button type='submit' class='btn btn-default btn-large'><i class='icon-ok'></i>&nbsp; Seguir</button>
<?php endif;?>
<?php else:?>
					<button type='submit' class='btn btn-primary btn-large'><i class='icon-ok'></i>&nbsp; Siguiendo</button>
<?php endif; ?>
			<a href='index.php?view=channel&id=<?php echo $channel->id?>' class='btn btn-info btn-inverse'>Ver Canal</a>
				</form>
		<h3 class='roboto'>Estadisticas</h3>
		</div>

	</div><!-- /container -->
<div class='row'>
	<div class='col-md-3'>
		<center><i class='fa fa-picture-o fa-4x' ></i><br><h1 class='roboto'><?php echo count($images);?><br>Imagenes</h1></center>
	</div>
	<div class='col-md-3'>
		<center><i class='li_paperplane' ></i><br><h1 class='roboto'><?php echo count($followers);?><br>Seguidores</h1></center>

	</div>
	<div class='col-md-3'>
				<center><i class='li_vallet' ></i><br><h1 class='roboto'>0<br>Albums</h1></center>
	</div>
	<div class='col-md-3'>
				<center><i class='li_world' ></i><br><h1 class='roboto'>0<br>Galerias</h1></center>		
	</div>
</div>
<div class='row'>
	<div class='col-md-12'>
<br><br>			<p class='alert alert-info'>El hecho de "seguir" un canal corresponde a ver las nuevas publicaciones en tu seccion de actividad.</p>
	</div>
</div>
<?php else:?>


<br>	<div class='row'>
		<div class="col-md-12">
		<div class='hero-unit'>
			<h2 class='roboto'>404 No se encontro el canal</h2>
			<p>Al parecer intentas acceder a un canal que no existe o ya ha sido eliminado.</p>
		</div>
		</div>
				<div class='span1'>

				</div>

	</div><!-- /container -->
<?php endif;?>
