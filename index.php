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
    echo("Si sirve");
    switch($_GET['view']){
        case "inicio":
            echo("Chi chenol");
            break;
        default:
            break;
    }
}else{
    $_GET['view'] = "inicio";
    header("Location:index.php?view=".urlencode("inicio"));
}

?>
</body>
</html>