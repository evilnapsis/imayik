</div>
<?php
if(Session::getUID()!=""){
  print "<script>window.location='home.php';</script>";
}
?>
<div class='river-bg white'>
<div class='container'>
<div class='row'>
	<div class='span6'>
		<div class='box roboto'>
			<h3>Tu cuenta  Yobup</h3>
			<h4>En Yobup puedes encontrar personas para trabajar contigo o para ti, con tu cuenta puedes agregar personas a tu lista de amigos, compa&ntilde;eros o colaboradores.</h4>
			<h4>Puedes buscar personas por lugar, trabajo, empresa, habilidades.</h4>
		</div>
    <br>
    <div class='pd20 belize-hole-bg roboto'>
<i class='icon-ok-sign pull-right' style='font-size:40px;margin-right:30px;margin-top:10px;'></i>
      <h3>Cuentas Verificadas</h3>
<div class='clearfix'></div>
      <h4 class='just'>Gana tu insignia de CUENTA VERIFICADA para tener mas VERACIDAD al enlistarte en las ofertas de trabajo, para ello debes comunicarte con nuestro equipo y responder un conjunto de preguntas clave.</h4>
    </div>
    <br><br>
	</div>
	<div class='span6'>
		<center><h3 class=''>Entrar a Yobuip!</h3></center>
<br><form class="form-horizontal" method="post" action="login.php">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" name="mail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox"> No cerrar sesion
      </label>
      <button type="submit" class="btn btn-success">Entrar a Yobiup</button>
    </div>
  </div>
</form><br>

    <div class='pd20 belize-hole-bg roboto'>
      <a href='index.php?module=register' style='color:white;text-decoration:none;'>No tengo una cuenta, quiero registrarme al servicio</a>
    </div>

	</div>
</div>
</div>
</div>
<br><br>
<br><br>