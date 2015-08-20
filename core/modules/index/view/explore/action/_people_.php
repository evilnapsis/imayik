		<ul class='class-menu pull-right'>
			<li class='active'><a href='index.php?module=explore' >Personas</a></li>
			<li><a href='index.php?module=explore&action=jobs'>Empleos</a></li>
		</ul>
<form>
<input type='text' placeholder='Tu busqueda' style='background:#f0f0f0;color:black;'>
</form>
<div class='clearfix'></div>
<?php

$pds = ProfileData::getAll();
if($pds!=null){
	print "<div class='cards'>";
	foreach($pds as $pd){
		print "<div class='card'>";

		print "<div class='sidebar'>";
		print "<div class='image'>";
if($pd->user->image!=null){
$url="res/storage/".$pd->user->id."/profile/".$pd->user->image;
print "<center><img src='$url'></center>";
}

		print "</div>";

		print "</div>";

		print "<div class='content'>";

		print "<div class='header'>";
		print "<div class='name'>";
		print "<a href='view.php?module=profile&id=".$pd->user->id."' style='color:black;text-decoration:none;'>";
		print $pd->user->name;
		print "</a>";
		print "</div>";
		print "<div class='title'>";
		print $pd->title;
		print "</div>";
		print "</div>";
		print "<div class='biografy'>";
		print $pd->biografy;
		print "</div>";

		print "<div class='btn-hire pull-right' style='margin-right:40px;'>Contratar</div>";
print "<ul type='none' class='views'>";

print "<li>";
print "111 <i class='icon-eye-open'></i>";
print "</li>";

print "<li>";
print " <i class='icon-heart'></i>";
print "</li>";

print "<li>";
print " <i class='icon-star'></i>";
print "</li>";

print "</ul>";

		print "<div class='clearfix'></div>";
		print "</div>";

		print "</div>";
	}
	print "</div>";
}

?>
<br>
