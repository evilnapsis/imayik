<?php

class ChannelWidget {
	public function renderMyHeader($channel){
/*		$img="";
		$url="";
		if($channel->image!=""){ $url="storage/channel/$channel->id/profile/$channel->image";}
		if($url!=""){$img="<img class=' media-object' src='$url' style='width:64px;height:64px;' data-src='holder.js/64x64'>";}
		else {$img="<img class=media-object'  data-src='holder.js/80x80'>";}
*/
echo <<<AAA
<div class="btn-group pull-right">
  <a class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" href="#">
    <i class='glyphicon glyphicon-cog'></i>
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href='index.php?view=channelpanel'><i class='icon-tasks'></i> Panel del Canal</a></li>
    <li><a href='index.php?view=channel&id=$channel->id'><i class='icon-eye-open'></i> Ver Canal</a></li>
  </ul>
</div>
			<h1>$channel->title</h1>			<p class='lead'>$channel->description</p>   
AAA;
	}

	public function renderHeader($channel){
		$img="";
		$url="";

$cfol = count(FollowerData::getByChannelId($_GET['id']));
$ffol = "";
$flink = "";

			if(Session::getUID()!=""){
			if(FollowerData::existFollowerChannel(Session::getUID(),$channel->id)==null){
				 $flink = "<a href='index.php?view=channelinfo&id=$channel->id' class='btn btn-default'><i class='glyphicon glyphicon-ok'></i>&nbsp; Seguir</a>";
			} else {
				$flink = "<a href='#' class='btn btn-default btn-primary disabled'><i class='icon-ok'></i>&nbsp; Siguiendo</a>";
			}
			}
			
if($cfol==1){ $ffol = "$cfol Seguidor";}
else { $ffol = "$cfol Seguidores";}

		if($channel->image!=""){ $url="storage/channel/$channel->id/profile/$channel->image";}
		if($url!=""){$img="<img class=media-object' src='$url' style='width:64px;height:64px;' data-src='holder.js/64x64'>";}
		else {$img="<img class=media-object'  data-src='holder.js/80x80'>";}

echo <<<AAA
<div class="media">
<!--  <a class="pull-left" href="#">
    $img
  </a> -->
			<h1><b>$channel->title</b> <small class='f18'>$ffol</small></h1>
			<p class='lead'>$channel->description</p>   
			$flink
			<br><br>
</div>
AAA;
	}




}

?>