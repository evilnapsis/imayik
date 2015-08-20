<form class="form-horizontal" method="post" action="add.php" id="regx">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Nombre</label>
    <div class="controls">
      <input type="text" name="name" class='inpt' id="name" placeholder="Escribe tu Nombre" value='<?php echo $u->name;?>'>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="inputEmail">Apellido</label>
    <div class="controls">
      <input type="text" name="name" class='inpt' id="name" placeholder="Escribe tu Nombre" value='<?php echo $u->lastname;?>'>
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" for="inputPassword">Correo Electronico</label>
    <div class="controls">
      <input type="text" name="mail" class='inpt' id="mail" placeholder="Escribe tu Correo Electronico" value='<?php echo $u->mail;?>'>
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" for="inputPassword">Numero Telefonico</label>
    <div class="controls">
      <input type="text" name="mail" class='inpt' id="mail" placeholder="Escribe tu Correo Electronico" value='<?php echo $u->phone;?>'>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button class="btn btn-primary">Actualizar Informacion</button>
    </div>
  </div>
</form>
<br><br><br><br>