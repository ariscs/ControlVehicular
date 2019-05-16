<?php

include('functions/rcon.php');
if(isset($_POST['Submit'])){
	$Vehiculo = $_POST['vehiculo'];
	$Fecha = $_POST['fecha'];
	$Periodo = $_POST['periodo'];
	$Dictamen = $_POST['dictamen'];

	$Con = Conectar();
	$SQL = "INSERT INTO verificaciones(Vehiculo, Fecha, Periodo, Dictamen) VALUES ('$Vehiculo','$Fecha','$Periodo','$Dictamen');";
	EjecutarConsulta($Con,$SQL);
	Desconectar($Con);
}

?>