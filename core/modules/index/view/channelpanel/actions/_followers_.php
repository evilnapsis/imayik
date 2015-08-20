<h1>Seguidores</h1>
    <a class="btn btn-default" href='index.php?view=channelpanel'>Configuracion</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=image2'>Imagen de Canal</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=followers'>Seguidores</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=comments'>Comentarios</a>
<br>
<?php
$followers = FollowerData::getByChannelId($channel->id);
if(count($followers)>0):
?>
<br><table class='table table-bordered table-hover'>
<?php foreach($followers as $follower):
$user = $follower->getUser();
 ?><tr>
	<td><?php echo $user->name." ".$user->lastname; ?></td>
	<td style='width:20px;'><i class='icon-ok'></i></td>
	</tr>
<?php endforeach; ?>
	
</table><br><br><br><br><br>
<?php else:?>
<br>	<div class='jumbotron'>
	<h2 class='roboto'>No tienes seguidores</h2>
	<p class='roboto'>Aun no tienes seguidores.</p>
	</div>
<?php endif; ?>