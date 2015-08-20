<?php
if(Session::getUID()!=""){
Core::$user = UserData::getById($_SESSION["user_id"]);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ImaYik | Compartir Imagenes</title>

    <!-- Bootstrap core CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">IMAYIK </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
<li>
 <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar imagenes ...">
                      <input type='hidden' name="view" value="search">
      </div>
    </form>

</li>
</ul>
<?php 
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
?>
<?php endif;?>
          <ul class="nav navbar-nav side-nav">
          <li><a href="./"><i class="fa fa-home"></i> Inicio</a></li>
<?php if($u!=null):?>
<!--          <li><a href="index.php?view=activity"><i class="fa fa-th-list"></i> Actividad</a></li> -->
<?php endif; ?>
          <li><a href="index.php?view=popular"><i class="fa fa-star"></i> Popular</a></li>
          <li><a href="index.php?view=news"><i class="fa fa-clock-o"></i> Recientes </a></li>
          </ul>



<?php if(Session::getUID()!=""):?>
<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
          <ul class="nav navbar-nav navbar-right navbar-user">
          <li><a data-toggle="modal" href="#uploadImageModal"><i class="fa fa-upload"></i> Subir</a></li>
            <!-- - - - - - - - - - -->
            <?php
$channels = ChannelData::getAllByUID(Session::getUID());
if(count($channels)==1):

$notifications = NotificationData::getAllByChannelId($channels[0]->id);
$notifications5 = NotificationData::getLast5ByChannelId($channels[0]->id);
if(count($notifications)>0):
            ?>
<li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="label label-danger"><?php echo count($notifications); ?></span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header"><?php echo count($notifications);?> Notificaciones</li>
                <?php foreach($notifications5 as $notif):
$theuser = UserData::getById($notif->user_id);
                ?>
                <li class="message-preview">
                  <a href="#">
                    <span class="name"><?php echo $theuser->name; ?>:</span>

                    <span class="message">

                    <?php       if($notif->notification_type_id==NotificationTypeData::getByName("Nuevo Comentario")->id){ echo "<i class='fa fa-comment'></i> Nuevo comentario&nbsp;"; }
      else if($notif->notification_type_id==NotificationTypeData::getByName("Nuevo Seguidor")->id){ echo "<i class='fa fa-ok'></i> Nuevo seguidor &nbsp;"; }
      else if($notif->notification_type_id==NotificationTypeData::getByName("Nuevo Like")->id){ echo "<i class='fa fa-thumbs-up'></i> Nuevo like &nbsp;"; }
      else if($notif->notification_type_id==NotificationTypeData::getByName("Nuevo Dislike")->id){ echo "<i class='fa fa-thumbs-down'></i> Nuevo dislike&nbsp;"; }
?>
                    </span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
              <?php endforeach; ?>
                <li><a href="index.php?view=notifications">Ver todas <span class="label label-danger"><?php echo count($notifications);?></span></a></li>
              </ul>
            </li>
          <?php endif;?>
          <?php endif;?>
            <!-- - - - - - - - - - -->

            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo $user; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=mychannel">Mi canal</a></li>
          <li><a href="index.php?view=user&id=<?php echo $u->id; ?>">Mi perfil</a></li>
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
<?php else:?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Acceso <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=login">Login</a></li>
          <li><a href="index.php?view=register">Registro</a></li>
        </ul>
<?php endif; ?>




        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("start");

?>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
<?php if(Session::getUID()!=""):
$channels = ChannelData::getAllByUID(Session::getUID());
if(count($channels)>0):
$channel = $channels[0];
?>

  <!-- Modal -->
  <div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Subir imagen</h4>
        </div>
        <div class="modal-body">

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
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif;?>
<?php endif;?>

<script src="res/bootstrap3/js/bootstrap.min.js"></script>

  </body>
</html>
