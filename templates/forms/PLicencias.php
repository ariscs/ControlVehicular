<?php

include('functions/rcon.php');
if(isset($_POST['Submit'])){
    $Conductor= $_POST['conductor'];
    $fExpedicion= $_POST['fExpedicion'];
    $Tipo= $_POST['tipo'];
    $fVencimiento= $_POST['fVencimiento'];
    $Lugar= $_POST['lugar'];
    $Expide= $_POST['expide'];

    $Con = Conectar();
    $SQL = "INSERT INTO licencias(Conductor, Expedicion, Tipo, Vencimiento, Lugar, Expide) 
        VALUES ('$Conductor', '$fExpedicion', '$Tipo', '$fVencimiento', '$Lugar', '$Expide')";
    EjecutarConsulta($Con,$SQL);
    Desconectar($Con);
}

?>