<?php
$channels = ChannelData::getAllByUID(Session::getUID());
// empieza aqui
if($channels!=null){
$channel = $channels[0];
if($channel!=null){
?>
<div class='row'>
	<div class='col-md-12'>
<?php
if(!isset($_GET['part'])){
  include "actions/_channel_.php";
}else {
  $part = $_GET['part'];
  if($part!="channel" && $part!="followers" && $part!="comments"&& $part!="image2"){
  }else {
    include "actions/_".$part."_.php";    
  }
}
?>
	</div>
</div>
<?php }}?>