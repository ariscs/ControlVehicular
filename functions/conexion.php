<?php

function Conectar (){
    $Parametros = parse_ini_file("configuracion.ini");
    $ServerName = $Parametros['Server'];
    $User = $Parametros['UserName'];
    $Password = $Parametros['Password'];
    $Bd = $Parametros['DataBase'];
    $Con=mysqli_connect($ServerName, $User, $Password, $Bd);
    return $Con;
}

function EjecutarConsulta($Con, $SQL){
    $Query = mysqli_query($Con, $SQL) or mysqli_error();
    return $Query;
}

function Desconectar($Con){
    mysqli_close($Con);
}

?>