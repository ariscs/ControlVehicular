<?php

include('functions/rcon.php');
if(isset($_POST['Submit'])){
	$Licencia= $_POST['licencia'];
	$Vehiculo= $_POST['vehiculo'];
	$IDOficial= $_POST['idOficial'];
	$Monto= $_POST['monto'];
	$Lugar= $_POST['lugar'];
	$Fecha= $_POST['fecha'];
	$Motivo= $_POST['motivo'];
	$Hora= $_POST['hora'];

    $Con = Conectar();
    $SQL = "INSERT INTO multas (Licencia,Vehiculo,IdOficial,Monto,Lugar,Fecha,Motivo,hora) 
		VALUES('$Licencia','$Vehiculo','$IDOficial','$Monto','$Lugar','$Fecha','$Motivo','$Hora');";
	EjecutarConsulta($Con,$SQL);
    Desconectar($Con);
}

?>