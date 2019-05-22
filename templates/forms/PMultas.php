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

    $Con = Conectar();
    $SQL = "INSERT INTO multas (Licencia,Vehiculo,IdOficial,Monto,Lugar,Fecha,Motivo) 
		VALUES('$Licencia','$Vehiculo','$IDOficial','$Monto','$Lugar','$Fecha','$Motivo');";
	EjecutarConsulta($Con,$SQL);

	$SQL = "SELECT * FROM multas WHERE Licencia = '$Licencia' AND IdOficial = '$IDOficial' AND Fecha = '$Fecha' AND Vehiculo = '$Vehiculo';";
	$Query = EjecutarConsulta($Con, $SQL);
	$Fila = mysqli_fetch_row($Query);

	$Folio = $Fila[0];
	$Hora = $Fila[6];

	$Hora = explode(" ", $Hora);
	$Hora = $Hora[1];

    if(!$multas = new SimpleXMLElement('temp/XML/Multas.xml', null, true)){
	}else{
		$nuevo = $multas->addChild('multa');
		$nuevo->addChild('Folio',$Folio);
		$nuevo->addChild('Licencia',$Licencia);
		$nuevo->addChild('Vehiculo',$Vehiculo);
		$nuevo->addChild('IdOficial',$IDOficial);
		$nuevo->addChild('Monto',$Monto);
		$nuevo->addChild('Lugar',$Lugar);
		$nuevo->addChild('Fecha',$Fecha);
		$nuevo->addChild('Motivo',$Motivo);
		$nuevo->addChild('Hora',$Hora);
		$multas->asXML('temp/XML/Multas.xml');
	}
	Desconectar($Con);
}

?>