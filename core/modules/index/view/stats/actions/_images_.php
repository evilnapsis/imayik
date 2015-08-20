<h3>Subida de Imagenes</h3>
<?php

$users = ImageData::getAllByDay();
if(count($users)>0):
?>
<table class='table table-bordered table-hover'>
<tr>
	<td>Fecha</td>
	<td>Total</td>
</tr>
<?php foreach($users as $user):?>
	<tr>
		<td><?php echo $user->created_date; ?></td>
		<td><?php echo $user->total; ?></td>
	</tr>
<?php endforeach; ?>
</table>

<?php endif; ?>