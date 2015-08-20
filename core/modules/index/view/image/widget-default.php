<?php
$image = ImageData::getById($_GET["id"]);
$u=null;
if(Core::$user!=null){ $u= Core::$user;}
?>
	<div class='row'>
		<div class="col-md-9">
		<?php if($image!=null):?>
<?php 
//if($image->privacy_id==1){ echo "<i class='fa fa-globe pull-right'></i>";}
//else if($image->privacy_id==2){ echo "<i class='fa fa-lock pull-right'></i>";}
?>
			<h1><?php echo $image->title;?>
			</h1><br>
			<img class="img-responsive" src='storage/channel/<?php echo $image->channel_id."/".$image->name; ?>'>
		<br><br>

            <?php
            $xlike=null;
            if(Session::getUID()!=""){
$xlike = IslikeData::getAllLikeImageUser($_GET['id'],Session::getUID());
}
            ?>

<?php
			$channel = ChannelData::getById($image->channel_id);
			echo "<a href='index.php?view=channel&id=$channel->id' class='btn btn-default pull-right'><i class='fa fa-th-large'></i> $channel->title</a>";
?>
<?php if(count($xlike)==0):?>
				 <div class="btn-group">
				  <a href="index.php?action=addlike&id=<?php echo $image->id; ?>&l=1" class="btn btn-default" ><i class='fa fa-thumbs-up'></i> Me Gusta</a>
				  <a href="index.php?action=addlike&id=<?php echo $image->id; ?>&l=0" class="btn btn-default "> No Me Gusta <i class='fa fa-thumbs-down'></i></a>
				</div>
<?php else:
if($xlike[0]->is_like=="1"){
	echo "<button class='btn btn-primary'><i class='fa fa-thumbs-up'></i>&nbsp;Me Gusta</button>";
}
else if($xlike[0]->is_like=="0"){
	echo "<button class='btn btn-danger'><i class='fa fa-thumbs-down'></i>&nbsp;No Me Gusta</button>";
}
 ?>

<?php endif;



 ?>
<br>            	<span class='label label-default'>visto <?php 
            	$cx = count(ImageViewData::getAllByImageId($_GET['id']));
            	$comments = CommentData::getAllByImageId($_GET['id']);
            	echo $cx;
            	if($cx==1){ echo " vez"; }
            	else { echo " veces"; }
            	?>  <i class='fa fa-eye-open'></i></span>
            	<div class='clearfix'></div>
<!-- Place this tag where you want the share button to render. -->

<!-- <ul>
<li style='display:inline;'><div class="g-plus" data-action="share" data-annotation="none"></div></li>
<li style='display:inline;'>
<div class="fb-share-button" data-href="http://yobup.com/index.php?view=image&id=<?php echo $image->id;?>" data-type="button"></div></li>
<li style='display:inline;'><a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-lang="es">Tweet</a></li>
</ul>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript">
  window.___gcfg = {lang: 'es-419'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
            </li>
         </ul> -->
		<h3>Descripcion</h3>
<?php 
			echo "<h4>".$image->description."</h4>";
			$tags = explode(",",$image->tags);
			if(count($tags)>1){
			echo "<div class='pull-right'>";
			foreach($tags as $t){
				echo "<span class='label label-info'><a href='index.php?view=tag&tag=$t' style='color:white;text-decoration:none;'>#$t</a></span>&nbsp;";
			}
			echo "</div>";
		}
			?>
<div class="clearfix"></div>
<?php if($u!=null):?>
<hr>
<h4 class='roboto'>Escribir Comentario 
<?php if(Session::getUID()!=""):?>
<small><?php echo $u->name." ".$u->lastname ;?></small>
<?php endif; ?>
</h4>
<form method="post" action="index.php?action=addcomment" id="comment">
<textarea class='form-control' name='content' id="content"></textarea>
<input type='hidden' name='reference' value='addimagecomment'>
<input type='hidden' name='image_id' value='<?php echo $image->id;?>'>
<br><button type='submit' class='btn btn-primary pull-right'>Enviar Comentario</button>
</form>
<?php endif;?>
<h3>Comentarios <?php  if(count($comments)>0){ echo "(".count($comments).")"; } ?></h3>

  	<?php foreach($comments as $com):?>
   <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" style='border-radius:50%;' data-src="holder.js/64x64">
              </a>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $com->getUser()->name." ".$com->getUser()->lastname; ?></h4>
                <p><?php echo $com->content; ?></p>
                <p class="text-muted"><?php echo date("d-M-Y h:i:s",strtotime($com->created_at));?></p>
              </div>
            </div>
  	<?php endforeach; ?>


<br><br>

  

		<?php else:?>

			<br><div class='jumbotron'>
				<div class='roboto' style='font-size:28px;font-weight:bold;'>La imagen no existe</div>
				<p class='roboto'>Intentas acceder a una imagen que ha sido borrada, si crees que es un error espera e intenta mas tarde ...</p>
			</div>
			<br><br><br><br><br><br><br>
		<?php endif;?>
		
		</div>
				<div class='col-md-2'>
		<?php if($image!=null):?>	

				<br><h4 class='roboto'>Similares</h4>
<div class='image-widget'>
<?php 
$cnt=0;
$image_similars = ImageViewData::getSearch($image->title);
foreach($image_similars as $image_similar):
	$image = $image_similar->getImage();
	$url = "storage/channel/$image->channel_id/".$image->name;
?>
<div class='item'>
		<div class='title roboto'><a href='index.php?view=image&id=<?php echo $image->id;?>'><?php echo $image->title; ?></a></div>
		<img class="img-responsive" src='<?php echo $url;?>'><br>
		<div class='subtitle roboto'>por <span class='channel'><?php echo $image->getChannel()->title; ?></span></div>
</div>
<?php endforeach; ?>
</div>
		<?php endif; ?>

		</div>

	</div><!-- /container -->
<?php  IpLogger::addImageViewIP($_GET['id']); ?>