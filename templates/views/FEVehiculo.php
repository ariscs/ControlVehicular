<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>ID Vehiculo
  <input name="id" type="text" id="id" />
  </label>
  <p>
    <label>
    <input type="submit" name="Submit" value="Eliminar" />
    </label>
  </p>
</form>
</div>

<?php
  include('functions/rcon.php');
	if(isset($_POST['id'])){
		$AUX = $_POST['id'];
		$Con = Conectar();
		$SQL = "DELETE FROM vehiculos WHERE IdVehiculo = '$AUX';";
    EjecutarConsulta($Con, $SQL);
		Desconectar($Con);
	}
?>