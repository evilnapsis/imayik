<a href='index.php?module=control&action=adduser' class='btn btn-primary pull-right'><i class='fa fa-plus'></i> Crear Usuario</a>
<h3>Usuarios</h3>
<?php

$users = UserData::getAll();
if(count($users)>0):
?>
<table class='table table-bordered table-hover'>
<tr>
	<td>Id</td>
	<td>Email</td>
	<td>Nombre</td>
	<td></td>
</tr>
<?php foreach($users as $user):?>
	<tr>
		<td><?php echo $user->id; ?></td>
		<td><?php echo $user->mail; ?></td>
		<td><?php echo $user->name." ".$user->lastname; ?></td>
		<td style='width:40px'>
			<div class="btn-group">
			  <a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">
			    <i class='icon-cog'></i>
			    <span class="caret"></span>
			  </a>
			  <ul class="dropdown-menu">
			    <li><a href=''>Modificar Usuario</a></li>
			    <li><a href=''>Bloquear Usuario</a></li>
			    <li><a href=''>Eliminar Usuario</a></li>
			  </ul>
			</div>

		</td>
	</tr>
<?php endforeach; ?>
</table>

<?php endif; ?>