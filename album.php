<?php 
session_start();
require_once("includes/db/db_conn.php");
include("includes/webpage/funcs.php");

if(isset($_GET['ida'])){
    // get id
    $ida = $_GET['ida'];
    
    // ALBUM INFO
    $sqlUp = "SELECT titulo_m, id_al, nome_al, ano_al, nome_a FROM album 
              LEFT JOIN musica ON album.id_al = musica.album_id_al 
              LEFT JOIN musica_has_artista ON musica_id_m = musica.id_m 
              LEFT JOIN artista ON artista.id_a = musica_has_artista.artista_id_a
              WHERE id_al = '$ida'";
    $result = mysqli_query($conn, $sqlUp);
    
    // SONG LIST VERIFICATION
    $sqlUp1 = "SELECT titulo_m, id_al, nome_al, ano_al, id_m FROM album 
               LEFT JOIN musica ON album.id_al = musica.album_id_al 
               WHERE id_al = '$ida'";
    $result1 = mysqli_query($conn, $sqlUp1);

    // SONG LIST
    $sqlUp2 = "SELECT titulo_m, id_al, nome_al, ano_al, id_m FROM album 
               LEFT JOIN musica ON album.id_al = musica.album_id_al 
               WHERE id_al = '$ida'";
    $result2 = mysqli_query($conn, $sqlUp2);

    
    
    $numRows = $result1 -> num_rows;
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
                    $albm = $row["nome_al"];
                    $nAlbm = clean($albm);
                    if(file_exists('media/'.$nAlbm.'.jpg')){
                        echo '<img class="songImg" src="media/'.$nAlbm.'.jpg" alt="default album cover">';
                    }
                    else{
                        echo '<img class="songImg" src="media/default-album-art.jpg" alt="default album cover">';
                    }
                    echo    '<div class="albumInfo">';
                    echo        '<p class="albumTitle">'.$row["nome_al"].'</p>';
                    echo        '<p class="albumAno">'.$row["nome_a"].' • '.$row["ano_al"].' • '.$numRows.' MUSICAS • ';
                                    AlbmGenre($row["id_al"]);
                    echo        '</p>';
                    if(isset($_SESSION['user'])){
                        echo        '<div class="albumBtns">';
                        echo            '<a class="alBtn" href="addMusic.php?ida='.$row["id_al"].'">ADD MUSICA</a>';
                        echo            '<a class="alBtn" href="editAlbum.php?ida='.$row["id_al"].'">EDIT ALBUM</a>';
                        echo            '<a class="alBtn" href="removerAlbum.php?ida='.$row["id_al"].'" onclick="verificar(event);">REMOVE ALBUM</a>';
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
                                echo        '<p class="songYear">';
                                                artistList($row["id_m"]);
                                echo        '</p>';
                                if(isset($_SESSION["user"])){
                                    echo        '<div class="songBtns">';
                                    echo            '<a class="sgBtn" href="editMusic.php?idm='.$row["id_m"].'">edit</a>';
                                    echo            '<a class="sgBtn" href="removerMusic.php?idm='.$row["id_m"].'&ida='.$row["id_al"].'" onclick="verificar(event);">remove</a>';
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