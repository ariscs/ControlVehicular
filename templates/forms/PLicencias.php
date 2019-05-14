<?php 
	//$idLicencia= $_POST['idLicencia'];
	$Conductor= $_POST['conductor'];
	$fExpedicion= $_POST['fExpedicion'];
    $Tipo= $_POST['tipo'];
    $fVencimiento= $_POST['fVencimiento'];
    $Lugar= $_POST['lugar'];
    $Expide= $_POST['expide'];

    include("functions/conexion.php");
    $Con = Conectar();
    $SQL = "INSERT INTO licencias(Conductor, FechaExp, Tipo, FehcaVen, Lugar, Expide) VALUES($Conductor', '$fExpedicion', '$Tipo', '$fVencimiento', '$Lugar', '$Expide');";
    EjecutarConsulta($Con,$SQL);
    Desconectar($Con);
?>