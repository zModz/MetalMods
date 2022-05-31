<?php 
require_once("includes/db/db_conn.php");

if(isset($_GET['ida'])){
    // get id
    $ida = $_GET['ida'];
    
    // ALBUM INFO
    $sqlUp = "SELECT titulo_m, nome_al, ano_al FROM album 
              LEFT JOIN musica ON album.id_al = musica.album_id_al 
              WHERE id_al = '$ida'";
    $result = mysqli_query($conn, $sqlUp);
    
    // SONG LIST
    $sqlUp1 = "SELECT titulo_m, nome_al, ano_al FROM album 
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
                    echo        '<p class="albumAno">ARTISTS_NAME • '.$row["ano_al"].' • '.$num_rows.' MUSICAS</p>';
                    echo    '</div>';
                    echo '</div>';
                    echo '<br>';
                    if($result -> num_rows > 0){
                        echo '<h1 style="color: white;">MUSICAS</h1>';
                        echo '<div class="musicShow">';
                        while($row = $result1 -> fetch_assoc()){                    
                            echo    '<div class="songInfo">';
                            echo        '<p class="songTitle">'.$row["titulo_m"].'</p>';           
                            echo        '<p class="songYear">ARTISTS_NAME</p>';
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