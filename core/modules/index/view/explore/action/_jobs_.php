		<ul class='class-menu pull-right'>
			<li><a href='index.php?module=explore' >Personas</a></li>
			<li class='active'><a href='index.php?module=explore&action=jobs'>Empleos</a></li>
		</ul>

<div class='clearfix'></div>

<?php

$pds = JobData::getAll();
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
		print "<a href='view.php?module=profile&id=".$pd->id."' style='color:black;text-decoration:none;'>";
		print $pd->title;
		print "</a>";
		print "</div>";
		print "<div class='title'>";
		print $pd->user->name;
		print "</div>";
		print "</div>";
		print "<div class='biografy'>";
		print $pd->description;
		print "</div>";

//		print "<div class='btn-hire pull-right' style='margin-right:40px;'>Contratar</div>";
print "<ul type='none' class='views'>";

print "<li>";
print "111 <i class='icon-eye-open'></i>";
print "</li>";

print "<li>";
print "111 <i class='icon-heart'></i>";
print "</li>";

print "<li>";
print "111 <i class='icon-star'></i>";
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
