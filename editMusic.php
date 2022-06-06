<?php 
require_once("includes/db/db_conn.php");

// sql go BRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST["Mtitulo"])){  
    $titulo = $_POST["Mtitulo"]; 
    $artista = $_POST["Martist"]; 
    $album = $_POST["Malbum"]; 
    $ano = $_POST["Mano"];
    $idm = $_GET['idm'];
  
    $sql = "UPDATE musicas SET nome_m='$titulo', artista_m='$artista', album_m='$album', ano_m='$ano' WHERE id_m = '$idm'";
    $result = $conn -> query($sql);
  
    if($result === TRUE){
      $fdb = 1;
      header("location: index.php?alerta=".$fdb);
    }
    else {
      $fdb = 0;
      header("location: editar_2.php?idm=".$idm."&alerta=".$fdb);
    }
}elseif(isset($_GET['idm'])){
  // get id
  $idm = $_GET['idm'];
  $sqlUp = "SELECT * FROM musicas WHERE id_m = '$idm'";

  $res = mysqli_query($conn, $sqlUp);
  $row = mysqli_fetch_array($res);

  $tituloM = $row["nome_m"]; 
  $artistaM = $row["artista_m"]; 
  $albumM = $row["album_m"]; 
  $anoM = $row["ano_m"];
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
        <form action="" method="post">
          <table id="formTab">
            <tr>
              <td>Titulo da Musica: </td>
              <td><input type="text" name="Mtitulo" value="<?=$tituloM ?>" required> </td>
            </tr>
            <tr>
              <td title="Separe os artistas por virgulas">Artista(s): </td>
              <td><input type="text" name="Martist" value="<?=$artistaM ?>" required> </td>
            </tr>
            <tr>
              <td>Album: </td>
              <td><input type="text" name="Malbum" value="<?=$albumM ?>" required> </td>
            </tr>
            <tr>
              <td>Ano de lançamento: </td>
              <td><input type="number" name="Mano" value="<?=$anoM ?>" required> </td>
            </tr>
            <tr>
              <td> </td>
              <td><input type="submit" value="Atualizar"> </td>
            </tr>
          </table>
        </form>
    </div>
    <!-- FOOTER -->
    <?php include("includes/webpage/footer.php") ?>
</body>
</html>