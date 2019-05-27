<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>idLicencia
  <input name="idLicencia" type="text" id="idLicencia" />
  </label>
  <p>
    <label>
    <input type="submit" name="Submit" value="Eliminar" class="sub2 btnAnimation"/>
    </label>
  </p>
</form>
</div>

<?php
  include('functions/rcon.php');
	if(isset($_POST['idLicencia'])){
		$AUX = $_POST['idLicencia'];
		$Con = Conectar();
		$SQL = "DELETE FROM licencias WHERE IdLicencia = '$AUX';";
    EjecutarConsulta($Con, $SQL);
		Desconectar($Con);
	}
?>
