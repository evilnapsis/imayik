<?php
$channels = ChannelData::getAllByUID(Session::getUID());
// empieza aqui
if($channels!=null){
$channel = $channels[0];
if($channel!=null){
?>

<div class='row'>
	<div class='span3'><br><br>
		<ul class="nav nav-tabs nav-stacked">
		<li><a href='index.php?module=stats'>Vision General</a></li>
		<li><a href='index.php?module=stats&action=images'>Subida de Imagenes</a></li>
		</ul>

<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" style='color:black;text-decoration:none;' data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Panel de Control
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
      <div class="accordion-inner">
        <a href='index.php?module=control'><i class='fa fa-dashboard'></i> Panel de Control</a>
      </div>
    </div>
  </div>
 <!-- <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Collapsible Group Item #2
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div> -->
</div>

	</div>
	<div class='span9'>
	<h2 class='roboto'>Estadisticas <small>BETA</small></h2>
<?php
if(!isset($_GET['action'])){
  include "actions/_intro_.php";
}else {
  $action = $_GET['action'];
  if($action!="intro" && $action!="images"){
  }else {
    include "actions/_".$action."_.php";    
  }
}
?>
	</div>
</div>
<?php }}?>