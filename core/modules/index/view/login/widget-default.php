<br><br><?php
if(Session::getUID()!=""){
//  print "<script>window.location='./';</script>";
}
?>
<div class='row'>


	<div class='col-md-4 col-md-offset-4'>

<div class="panel panel-default">
<div class="panel-heading">Login</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="login.php">
  <div class="control-group row">
    <div class="controls col-md-12">
      <input type="text" name="mail" class="form-control" placeholder="Usuario o Email">
    </div>
  </div><br>
  <div class="control-group row">
    <div class="controls col-md-12">
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
  </div>
  <br>
  <div class="control-group">
      <button type="submit" class="btn btn-primary btn-block btn-large">Ingresar</button>
      <a href="./index.php?view=register " class="btn-block btn btn-default">Registro</a>

  </div>
</form>
</div>
</div>

	</div>
</div>
<br><br>
<br><br>