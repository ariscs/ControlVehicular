<?php 

include('functions/rcon.php');
if(isset($_POST['Submit'])){
	$Vehiculo = $_POST['vehiculo'];
	$Anio = $_POST['anio'];
	$Monto = $_POST['monto'];
	
	$Con = Conectar();
	$SQL = "INSERT INTO tenencias(Vehiculo, Annio, Monto) 
		VALUES ('$Vehiculo','$Anio','$Monto');";
	EjecutarConsulta($Con,$SQL);
	Desconectar($Con);
}

?>