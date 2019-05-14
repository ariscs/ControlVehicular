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
                include('templates/views/FLicencias.html');
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