<?php 

session_start();

if($_SESSION['val']){
    if(isset($_GET['aux'])){
        include('templates/views/menuView.html');
        switch($_GET['aux']){
            case "fconductores":
                include('templates/views/FConductores.html');
                break;
            case "flicencias":
                require_once('templates/forms/PLicencias.php');
                include('templates/views/FLicencias.html');
                break;
            case "fpropietarios":
                require_once('templates/forms/PPropietarios.php');
                include('templates/views/FPropietarios.html');
                break;
            case "fvehiculo":
                require_once('templates/forms/PVehiculo.php');
                include('templates/views/FVehiculo.html');
                break;
            case "ftenencia":
                require_once('templates/forms/PTenencia.php');
                include('templates/views/FTenencia.html');
                break;
            case "fverificacion":
                require_once('templates/forms/PVerificacion.php');
                include('templates/views/FVerificacion.html');
                break;
            case "fmultas":
                require_once('templates/forms/PMultas.php');
                include('templates/views/FMultas.html');
                break;
            default:   
                break;
        }
    }else{
        $_GET['aux'] = "menu";
        header("Location:index.php?view=menu&aux=menu");
    }
}else{
    header("Location:index.php?view=login");
}

?>