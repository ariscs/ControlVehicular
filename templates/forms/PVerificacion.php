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

	if ($Dictamen == "1") {
		$Dictamen= "Aprobado";
	}else{
		$Dictamen= "Reprobado";
	}

	if(!$verificaciones = new SimpleXMLElement('temp/XML/Verificaciones.xml', null, true)){
	}else{
		$nuevo = $verificaciones->addChild('verificacion');
		$nuevo->addChild('Vehiculo',$Vehiculo);
		$nuevo->addChild('Fecha',$Fecha);
		$nuevo->addChild('Periodo',$Periodo);
		$nuevo->addChild('Dictamen',$Dictamen);
		$verificaciones->asXML('temp/XML/Verificaciones.xml');
	}
}

?>