<?php 
session_start();
require_once("includes/db/db_conn.php");
include("includes/webpage/funcs.php");

// sql shenenigans
$sql = "SELECT * FROM artista ORDER BY nome_a ASC";
// $sql = "SELECT titulo_m, nome_al, ano_al FROM musica RIGHT JOIN album ON musica.album_id_al = album.id_al ORDER BY titulo_m ASC";
$result = $conn -> query($sql);

// limpa characteres especiais
function clean($string) {
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
// ISTO É PARA LIMPAR O NOME DO ALBUM QUANDO VEM DA BASE DE DADOS
// PARA SER COMPARADO COM O NOME DO FICHEIRO QUE CONTEM A ARTE DO ALBUM

// checks se existe um alerta
if(isset($_GET["alerta"])){
    $msgAlerta = "<p class='alertas'>SUCESSO!</p>";
}
else{
    $msgAlerta = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/webpage/header.php"); ?>
<body>
    <!-- NAV -->
    <?php 
        include("includes/webpage/nav.php");
    ?>
    <!-- CONTENT -->
    <div id="content">
        <?php 
            if(isset($_SESSION["user"])){
                echo '<div id="adminMenu">';
                echo    '<a href="addArtista.php">ADD ARTISTA</a>';
                echo '</div>';

            }
            
            echo $msgAlerta;

            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){     

                    echo '<a class="boxLink" href="artista.php?ida='.$row["id_a"].'">';
                    echo '<div class="box">';
                    echo    '<div class="songInfo">';
                    echo        '<p class="songTitle" title="'.$row["nome_a"].'">'.$row["nome_a"].'</p>';
                    // echo        '<p class="songYear">'.$row["ano_al"].'</p>';
                    echo    '</div>';
                    echo '</div>';
                    echo '</a>';
                }
            }
            else{
                echo "<a href='https://open.spotify.com/playlist/0O8Oc3snLMOcGjDdi9yKY4?si=9d2c537ba8964904' class='easter'>Nada para mostrar</a>";
            }
        ?>
    </div>
    <!-- FOOTER -->
    <?php include("includes/webpage/footer.php") ?>
</body>
</html>