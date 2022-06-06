<?php 
session_start();
require_once("includes/db/db_conn.php");

// sql go BRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST["Mtitulo"])){  
    $titulo = $_POST["Mtitulo"];
    $idAl = $_POST["musicDrop"];
    $idm = $_GET['idm'];
  
    $sql = "UPDATE musica SET titulo_m='$titulo', album_id_al='$idAl' WHERE id_m = '$idm'";
    $result = $conn -> query($sql);
  
    if($result === TRUE){
      $fdb = 1;
      header("location: index.php?alerta=".$fdb);
    }
    else {
      $fdb = 0;
      header("location: erro.php?alerta=".$fdb);
    }
}elseif(isset($_GET['idm'])){
  // get id
  $idm = $_GET['idm'];
  $sqlUp = "SELECT id_m, titulo_m, id_al, nome_al FROM musica 
              LEFT JOIN album ON musica.album_id_al = album.id_al
              WHERE id_m = '$idm'";

  $res = mysqli_query($conn, $sqlUp);
  $row = mysqli_fetch_array($res);

  $tituloM = $row["titulo_m"];
  $idal = $row["id_al"];
  $nomeAl = $row["nome_al"];

  $sql2 = "SELECT * from album";
  $res2 = mysqli_query($conn, $sql2);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/webpage/header.php"); ?>
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
              <td>Album: </td>
              <td><select name="musicDrop" id="dropMusic">
                <?php
                  while($rows = $res2 -> fetch_array()){
                    $idal2 = $rows["id_al"];
                    echo '<option value="'.$idal2.'" active>'.$rows["nome_al"].'</option>';
                  }
                ?>
              </select> </td>
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