<div class='row'>
	<div class='span8'>
<?php
if(!isset($_GET['action'])){
	include "action/_people_.php";
}else {
	$action = $_GET['action'];
	if($action!="jobs"){
	}else {
		include "action/_".$action."_.php";		
	}
}
?>

	</div>
	<div class='span4 visible-mobile'>
		<div class='river-bg white just' style='padding:20px;'>
			<h4>Categorias</h4>
<?php
foreach(AreaData::getAll() as $area){
	echo "<div class='belize-hole-bg' style='padding:3px;margin-top:2px;margin-left:2px;float:left;'>".$area->name."</div>";
}
?>
<div class='clearfix'></div>
		</div>
<br>
		<div class='river-bg white just' style='padding:20px;'>
			<p>Encuentra en <b>Yobup</b> excelentes oportunidades de trabajo, con los siguientes servicios : </p>
			<ul type="none">
				<li><i class='icon-ok'></i> Bolsa de Trabajo</li>
				<li><i class='icon-ok'></i> Mensajeria</li>
				<li><i class='icon-ok'></i> Preguntas y Respuestas</li>
			</ul>
		</div>
<br>
		<div class='pd10 just' style='background:#f0f0f0;'>
			<h5>Tu anuncio AQUI</h5>
			<p style='font-size:12px;'>Ofrece tus productos o servicios en nuestra plataforma de anuncios.</p>
		</div>
	</div>
</div>

