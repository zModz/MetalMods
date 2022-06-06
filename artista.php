<?php 
session_start();
require_once("includes/db/db_conn.php");
include("includes/webpage/funcs.php");

if(isset($_GET['ida'])){
    // get id
    $ida = $_GET['ida'];
    
    // ALBUM INFO
    $sqlUp = "SELECT * FROM artista 
              WHERE id_a = '$ida'";
    $result = mysqli_query($conn, $sqlUp);
    
    // SONG LIST VERIFICATION
    $sqlUp1 = "SELECT titulo_m, id_m, nome_a, id_a FROM artista 
               LEFT JOIN musica_has_artista ON artista_id_a = id_a
               LEFT JOIN musica ON id_m = musica_id_m 
               WHERE id_a = '$ida'";
    $result1 = mysqli_query($conn, $sqlUp1);

    // SONG LIST
    $sqlUp2 = "SELECT titulo_m, id_m, nome_a, id_a FROM artista 
               LEFT JOIN musica_has_artista ON artista_id_a = id_a
               LEFT JOIN musica ON id_m = musica_id_m 
               WHERE id_a = '$ida'";
    $result2 = mysqli_query($conn, $sqlUp2);

    
    
    $num_rows = $result1 -> num_rows;
}

// limpa characteres especiais
function clean($string) {
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
// ISTO É PARA LIMPAR O NOME DO ALBUM QUANDO VEM DA BASE DE DADOS
// PARA SER COMPARADO COM O NOME DO FICHEIRO QUE CONTEM A ARTE DO ALBUM
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/webpage/header.php"); ?>
<body>
    <!-- NAV -->
    <?php include("includes/webpage/nav.php") ?>
    <!-- CONTENT -->
    <div id="content">
        <div class="albumPage">
            <?php
                if($row = $result -> fetch_assoc()){                    
                    echo '<div class="album_banner">';
                    echo    '<div class="albumInfo">';
                    echo        '<p class="albumTitle">'.$row["nome_a"].'</p>';
                    // echo        '<p class="albumAno">'.$row["nome_a"].' • '.$row["ano_al"].' • '.$num_rows.' MUSICAS • ';
                    //                 AlbmGenre($row["id_al"]);
                    // echo        '</p>';
                    if(isset($_SESSION['user'])){
                        echo        '<div class="albumBtns">';
                        echo            '<a class="alBtn" href="editArtista.php?ida='.$row["id_a"].'">EDIT ARTISTA</a>';
                        echo            '<a class="alBtn" href="removerArtista.php?ida='.$row["id_a"].'" onclick="verificar(event);">REMOVE ARTISTA</a>';
                        echo        '</div>';
                    }
                    echo    '</div>';
                    echo '</div>';
                    echo '<br>';
                    if($row = $result1 -> fetch_assoc()){
                        if($row["id_m"] !== NULL){
                            echo '<h1 style="color: white;">MUSICAS</h1>';
                            echo '<div class="musicShow">';
                            while($row = $result2 -> fetch_assoc()){                    
                                echo    '<div class="songInfo">';
                                echo        '<p class="songTitle">'.$row["titulo_m"].'</p>';
                                // echo        '<p class="songYear">';
                                //                 artistList($row["id_m"]);
                                // echo        '</p>';
                                if(isset($_SESSION["user"])){
                                    echo        '<div class="songBtns">';
                                    echo            '<a class="sgBtn" href="editMusic.php?idm='.$row["id_m"].'">edit</a>';
                                    echo            '<a class="sgBtn" href="removerMusic.php?idm='.$row["id_m"].'&ida='.$row["id_a"].'" onclick="verificar(event);">remove</a>';
                                    echo        '</div>';
                                }
                                echo    '</div>';
                            }
                            echo '</div>';
                        }
                        else{
                            echo "<a class='easter'>Este album não tem musicas!</a>";
                        }    
                    }
                }
                else{
                    echo "<a href='https://open.spotify.com/playlist/0O8Oc3snLMOcGjDdi9yKY4?si=9d2c537ba8964904' class='easter'>ID desconhecido!</a>";
                }
            ?>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include("includes/webpage/footer.php") ?>
</body>
</html>