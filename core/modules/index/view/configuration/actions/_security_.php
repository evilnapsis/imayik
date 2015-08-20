<h3 class='roboto'>Cambiar Contrase&ntilde;a</h3>
<form class="form-horizontal" method="post" action="add.php" id="passwd">
    <div class="control-group">
    <label class="control-label" for="inputPassword">Contrase&ntilde;a Actual</label>
    <div class="controls">
      <input type="password" class='inpt' name="password" id="actual"  placeholder="Tu password actual">
    </div>
</div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Contrase&ntilde;a Nueva</label>
    <div class="controls">
      <input type="password" class='inpt' name="newpassword" id="password"  placeholder="Tu nuevo password">
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword" >Confirmar Contrase&ntilde;a Nueva</label>
    <div class="controls">
      <input type="password" class='inpt' name="confirm" id="confirm"  placeholder="Confirmar nuevo password.">
      <input type="hidden" name="reference" value="updatepassword">
    </div>
  </div>


  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Actualizar Contrase&ntilde;a</button>
    </div>
  </div>
</form>
<br><br><br>
<script>
  $("#passwd").submit(function(e){
    if($("#actual").val()==""||$("#password").val()==""||$("#confirm").val()==""){
      e.preventDefault();
      alert("No puedes dejar los campos en blanco.");
    }else {
       if($("#password").val()==$("#confirm").val()){

        }else{
          e.preventDefault();
          alert("La confirmacion no coincide.");
        }
    }
  });
</script>