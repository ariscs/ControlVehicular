<?php

if($_SESSION['val']){
    if(isset($_GET['aux'])){
        include('templates/views/menuView.html');
        switch($_GET['aux']){
            case "fconductores":
                require('templates/forms/PConductores.php');
                include('templates/views/FConductores.html');
                break;
            case "fcconductores":
                include('templates/views/FCConductores.php');
                break;
            case "feconductores":
                include('templates/views/FEConductores.php');
                break;
            case "fmconductores":
                include('templates/views/FMConductores.php');
                break;
            case "flicencias":
                require_once('templates/forms/PLicencias.php');
                include('templates/views/FLicencias.html');
                break;
            case "fclicencias":
                include('templates/views/FCLicencias.php');
                break;
            case "felicencias":
                include('templates/views/FELicencias.php');
                break;
            case "fpdfLicencias":
                include('templates/views/fpdfLicencias.html');
                break;
            case "fpropietarios":
                require_once('templates/forms/PPropietarios.php');
                include('templates/views/FPropietarios.html');
                break;
            case "fcpropietarios":
                include('templates/views/FCPropietarios.php');
                break;
            case "fepropietarios":
                include('templates/views/FEPropietarios.php');
                break;
            case "fvehiculo":
                require_once('templates/forms/PVehiculo.php');
                include('templates/views/FVehiculo.html');
                break;
            case "fcvehiculo":
                include('templates/views/FCVehiculo.php');
                break;
            case "fevehiculo":
                include('templates/views/FEVehiculo.php');
                break;
            case "fmvehiculo":
                include('templates/views/FMVehiculos.php');
                break;
            case "fpdfConductores":
                include('templates/views/fpdfConductores.html');
                break;                
            case "ftenencia":
                require_once('templates/forms/PTenencia.php');
                include('templates/views/FTenencia.html');
                break;
            case "fctenencia":
                include('templates/views/FCTenencias.php');
                break;
            case "fetenencia":
                include('templates/views/FETenencia.php');
                break;
            case "fverificacion":
                require_once('templates/forms/PVerificacion.php');
                include('templates/views/FVerificacion.html');
                break;
            case "fcverificacion":
                include('templates/views/FCVerificacion.php');
                break;
            case "feverificacion":
                include('templates/views/FEVerificacion.php');
                break;
            case "fpdfVerificaciones":
                include('templates/views/fpdfVerificaciones.html');
                break;
            case "fmultas":
                require_once('templates/forms/PMultas.php');
                include('templates/views/FMultas.html');
                break;
            case "fpdfMulta":
                include('templates/views/fpdfMulta.html');
                break;
            case "fcmultas":
                include('templates/views/FCMultas.php');
                break;
            case "femultas":
                include('templates/views/FEMultas.php');
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