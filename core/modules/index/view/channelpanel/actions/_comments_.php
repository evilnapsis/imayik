<h1>Comentarios</h1>
    <a class="btn btn-default" href='index.php?view=channelpanel'>Configuracion</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=image2'>Imagen de Canal</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=followers'>Seguidores</a>
    <a class="btn btn-default" href='index.php?view=channelpanel&part=comments'>Comentarios</a>
<br>
<?php
$comments = CommentData::getAllByChannelId($channel->id);
if(count($comments)>0):
?>
<?php foreach($comments as $com):
$user = $com->getUser();
 ?><tr>
   <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" data-src="holder.js/64x64">
              </a>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $user->name." ".$user->lastname; ?> en <a href=''><?php echo $com->getImage()->title;?></a></h4>
                <?php echo $com->content; ?>
              </div>
            </div>
<?php endforeach; ?>
	
<br><br><br><br><br>
<?php else:?>
<br>  <div class='hero-unit'>
    <h2 class='roboto'>No tienes comentarios</h2>
    <p class='roboto'>Aun no tienes comentarios.</p>
  </div>
  <br><br><br><br><br>
<?php endif; ?>
