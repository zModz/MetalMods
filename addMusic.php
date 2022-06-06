<?php 
session_start();
require_once("includes/db/db_conn.php");

if(!$_SESSION["user"]){
  header("erro.php");
}


// sql insert inserts the things to insert
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST["Mtitulo"])){  
    $titulo = $_POST["Mtitulo"]; 
    $idAl = $_GET["ida"];
  
    $sql = "INSERT INTO musica (titulo_m, album_id_al) VALUES ('$titulo', '$idAl')";
    $result = $conn -> query($sql);
  
    if($result === TRUE){
      $fdb = 1;
      header("location: index.php?alerta=".$fdb);
    }
    else {
      $fdb = 0;
      header("location: inserir.php?alerta=".$fdb);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="includes/styles/style.css">
    <title>Project</title>
</head>
<body>
  <!-- NAV -->
    <?php include("includes/webpage/nav.php") ?>
    <!-- CONTENT -->
    <div id="content">
        <h1 class="pageTitle">INSERIR</h1>
        <form action="" method="post">
          <table id="formTab">
            <tr>
              <td>Titulo da Musica: </td>
              <td><input type="text" name="Mtitulo" required> </td>
            </tr>
            <tr>
              <td> </td>
              <td><input type="submit" value="Adicionar"> </td>
            </tr>
          </table>
        </form>
    </div>
    <!-- FOOTER -->
    <?php include("includes/webpage/footer.php") ?>
</body>
</html>