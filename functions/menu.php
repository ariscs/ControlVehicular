<?php 

session_start();

if($_SESSION['val']){
    include('templates/views/menuView.html');
}else{
    header("Location:index.php?view=login");
}

?>