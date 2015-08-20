<h3>Crear Usuario</h3>

<form method='post' action='add.php' class='form-horizontal'  id='form_upload'>


  <div class="control-group" id='name'>
    <label class="control-label" for="inputEmail">Nombre</label>
    <div class="controls">
      <input type="text" name='name' id="input_name" style='width:280px;' placeholder="Nombre">
<span class='help-inline' id='name_control'>Debes escribir un nombre real.</span>
    </div>
  </div>
  <div class="control-group" id='lastname'>
    <label class="control-label" for="inputEmail">Apellido</label>
    <div class="controls">
      <input type="text" name='lastname' id="input_lastname" style='width:280px;' placeholder="Apellido">
<span class='help-inline' id='lastname_control'>Debes escribir un apellido.</span>
    </div>
  </div>
  <div class="control-group" id='nick'>
    <label class="control-label" for="inputEmail">Nick</label>
    <div class="controls">
      <input type="text" name='nick' id="input_nick" style='width:280px;' placeholder="Nick">
<span class='help-inline' id='nick_control'>Debes escribir un alias de usuario.</span>
    </div>
  </div>
  <div class="control-group" id='mail'>
    <label class="control-label" for="inputEmail">Correo Electronico</label>
    <div class="controls">
      <input type="text" name='mail' id="input_mail" style='width:280px;' placeholder="Email">
<span class='help-inline' id='mail_control'>Debes escribir un correo electronico.</span>
    </div>
  </div>
    <div class="control-group" id='password'>
    <label class="control-label" for="inputEmail">Password</label>
    <div class="controls">
      <input type="text" name='password' id="input_password" style='width:280px;' placeholder="Password">
<span class='help-inline' id='password_control'>Debes escribir un password.</span>
    </div>
  </div>
    <div class="control-group" id='phone'>
    <label class="control-label" for="inputEmail">Telefono</label>
    <div class="controls">
      <input type="text" name='phone' id="input_phone" style='width:280px;' placeholder="Telefono">
<span class='help-inline' id='phone_control'>Debes escribir un numero telefonico.</span>
    </div>
  </div>
      <div class="control-group" id='is_admin'>
    <label class="control-label" for="inputEmail">Es administrador</label>
    <div class="controls">
      <input type="checkbox" name='is_admin' id="input_is_admin" >
<span class='help-inline' id='is_admin_control'>Selecciona para convertir administrador</span>
    </div>
  </div>
      <div class="control-group" id='is_active'>
    <label class="control-label" for="inputEmail">Esta activo</label>
    <div class="controls">
      <input type="checkbox" name='is_active' id="input_is_active" checked="true">
<span class='help-inline' id='is_active_control'>Selecciona si el usuario esta activo (no bloquado)</span>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
    <input type='hidden' name='reference' value='adduser'>
      <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </div>
  </div>
</form>