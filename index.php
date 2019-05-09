<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="templates/css/style.css">

    <title>Control Vehicular</title>
</head>
<body>
<?php

if(isset($_GET['view'])){
    switch($_GET['view']){
        case "login":
            include("templates/views/login.html");
            break;
        case "close":
            header("Location:functions/close.php");
            break;
        case "error":
            include('templates/views/error.html');
            break;
        default:
            header("Location:index.php?view=".urlencode("error"));        
            break;
    }
}else{
    $_GET['view'] = "inicio";
    header("Location:index.php?view=".urlencode("login"));
}

?>
</body>
</html>