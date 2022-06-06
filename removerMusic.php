<?php 
session_start();
require_once("includes/db/db_conn.php");

// checks se existe um alerta
if(isset($_GET["alerta"])){
    $msgAlerta = "<p class='alertas'>SUCESSO!</p>";
}
else{
    $msgAlerta = "";
}

// checks se existe id, remove comforme esse id
if(isset($_GET['idm']) && isset($_GET["ida"])){
    $idm = $_GET['idm'];
    $ida = $_GET["ida"];
    $sqlrm = "DELETE FROM musica WHERE id_m = '$idm'";
    $res = $conn -> query($sqlrm);
    
    if($res === true){
        $fdb = 1;
        header('location: album.php?ida='.$ida.'&alerta='.$fdb);
    }
    else{
        $fdb = 0;
        header("location: erro.php?alerta=".$fdb);  
    }
}