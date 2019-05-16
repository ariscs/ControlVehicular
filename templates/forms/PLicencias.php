<?php

include('functions/rcon.php');
if(isset($_POST['Submit'])){
    $Conductor= $_POST['conductor'];
    $fExpedicion= $_POST['fExpedicion'];
    $Tipo= $_POST['tipo'];
    $fVencimiento= $_POST['fVencimiento'];
    $Lugar= $_POST['lugar'];
    $Expide= $_POST['expide'];
    $Foto= $_FILES['Foto'];

    $_FILES['Foto']['name']=$Conductor . ".jpg";
    
    $name = $_FILES['Foto']['name'];
    $location = "C:/xampp/htdocs/ControlVehicular/templates/img/Fotos";
    $tmp_name = $_FILES['Foto']['tmp_name'];
    

    move_uploaded_file($tmp_name, $location.$name);
    $location2=$location.$Conductor;

    $Con = Conectar();
    $SQL = "INSERT INTO licencias(Conductor, Expedicion, Tipo, Vencimiento, Lugar, Expide, Foto) 
        VALUES ('$Conductor', '$fExpedicion', '$Tipo', '$fVencimiento', '$Lugar', '$Expide','$location2')";
    EjecutarConsulta($Con,$SQL);
    Desconectar($Con);
}

?>