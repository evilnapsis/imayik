<div class='row'>

<div class='col-md-12'>
<a href='index.php?action=delnotifications' class='btn btn-danger pull-right'>Eliminar Notificaciones</a>

<h1>Notificaciones
<small><?php 
$channels = ChannelData::getAllByUID(Session::getUID());
$notifications = NotificationData::getAllByChannelId($channels[0]->id);

$c = count($notifications);
echo $c;
if($c==1){ echo " Nueva Notificacion";}
else { echo " Nuevas Notificaciones";}
?></small>
</h1>
<?php if($c>0):?>
<?php foreach($notifications as $notification):?>
   <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" data-src="holder.js/64x64">
              </a>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $notification->brief; ?></h4>
                <?php if($notification->image_id!=null){
                	$image = $notification->getImage();
                  $user = $notification->getUser();
                	echo "<a href='index.php?module=user&id=$user->id'>$user->name $user->lastname</a> te ha escrito un nuevo comentario en la imagen <a href='index.php?module=image&id=$image->id'>$image->title</a>";
                	}?>
              </div>
            </div>
<?php endforeach; ?>
<?php else: ?>
  <div class='hero-unit'>
  <h2>No tienes notificaciones</h2>
  <p>Debes subir imagenes para que las personas interactuen con ellas y contigo.</p>
  </div>
<?php endif; ?>
</div>

</div>
<br><br><br><br><br><br><br><br><br><br>