<?php

include('functions/rcon.php');
if(isset($_POST['Submit'])){
	$Propietario = $_POST['propietario'];
	$Placa = $_POST['placa'];
	$Tipo = $_POST['tipo'];
    $Modelo = $_POST['modelo'];
    $Anio = $_POST['anio'];
	$Uso = $_POST['uso'];
	$Color = $_POST['color'];
	$numPuertas = $_POST['numPuertas'];
    $Marca = $_POST['marca'];
    $Transmision = $_POST['transmision'];
	$capCarga = $_POST['capCarga'];
	$Serie = $_POST['serie'];
	$numMotor = $_POST['numMotor'];
    $Linea = $_POST['linea'];
    $Sublinea = $_POST['sublinea'];
	$Cilindraje = $_POST['cilindraje'];
	$Combustible = $_POST['combustible'];
	$Origen = $_POST['origen'];

	$Con = Conectar();
	$SQL = "INSERT INTO vehiculos(Propietario, Placa, Tipo, Modelo, Annio, Uso, Color, Puertas, Marca, Transmision, capCarga, Serie, numMotor, Linea, Sublinea, Cilindraje, Combustible, Origen) 
		VALUES ('$Propietario','$Placa','$Tipo','$Modelo','$Anio','$Uso','$Color','$numPuertas','$Marca','$Transmision','$capCarga','$Serie','$numMotor','$Linea','$Sublinea','$Cilindraje','$Combustible','$Origen');";
	EjecutarConsulta($Con, $SQL);
	Desconectar($Con);
}

?>