<?php 

include('functions/rcon.php');
if(isset($_POST['Submit'])){
	$RFC= $_POST['RFC'];
	$CURP= $_POST['CURP'];
	$Nombre= $_POST['nombre'];
	$Direccion= $_POST['direccion'];

	$Con = Conectar();
	$SQL = "INSERT INTO propietarios VALUES('$RFC','$CURP','$Nombre','$Direccion');";
	EjecutarConsulta($Con, $SQL);
	Desconectar($Con);
}

?>