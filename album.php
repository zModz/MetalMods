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
    
    // SONG LIST
    $sqlUp1 = "SELECT titulo_m, nome_al, ano_al, id_m FROM album 
               LEFT JOIN musica ON album.id_al = musica.album_id_al 
               WHERE id_al = '$ida'";
    $result1 = mysqli_query($conn, $sqlUp1);

    
    
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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="includes/styles/style.css">
    <script src="includes/webpage/uteis.js"></script>
    <title>MetalMods</title>
</head>
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
                    echo        '<p class="albumAno">'.$row["nome_a"].' • '.$row["ano_al"].' • '.$num_rows.' MUSICAS  •  '.AlbmGenre($row["id_al"]).'</p>';
                    if(isset($_SESSION['user'])){
                        echo        '<div class="albumBtns">';
                        echo            '<a class="alBtn" href="addMusic.php?ida='.$row["id_al"].'">ADD MUSICA</button>';
                        echo            '<a class="albtn">EDIT ALBUM</button>';
                        echo            '<a class="albtn">REMOVE ALBUM</button>';
                        echo        '</div>';
                    }
                    echo    '</div>';
                    echo '</div>';
                    echo '<br>';
                    if($result -> num_rows > 0){
                        echo '<h1 style="color: white;">MUSICAS</h1>';
                        echo '<div class="musicShow">';
                        while($row = $result1 -> fetch_assoc()){                    
                            echo    '<div class="songInfo">';
                            echo        '<p class="songTitle">'.$row["titulo_m"].'</p>';
                            //ARTIST LIST
                            $idm = $row["id_m"];
                            $sqlUp2 = "SELECT id_m, artista.id_a, artista.nome_a FROM musica 
                                        LEFT JOIN musica_has_artista ON musica_id_m = musica.id_m 
                                        LEFT JOIN artista ON artista.id_a = musica_has_artista.artista_id_a
                                        WHERE id_m = '$idm'";
                            $result2 = mysqli_query($conn, $sqlUp2);
                            echo '<p class="songYear">';
                            while($rowArt = $result2 -> fetch_assoc()){
                                if($rowArt["id_a"] > 1 && $rowArt["id_m"] == $idm){
                                    echo ", ".$rowArt["nome_a"];
                                }else{
                                    echo $rowArt["nome_a"];
                                }
                            } 
                            echo '</p>';        
                            echo    '</div>';
                        }
                        echo '</div>';
                    }
                    else{
                        echo "<a class='easter'>Este album não tem musicas!</a>";
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