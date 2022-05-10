<?php 
require_once("includes/db/db_conn.php");

$sql = "SELECT 	* FROM musicas ORDER BY nome_m ASC";
$result = $conn -> query($sql);


function clean($string) {
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if(isset($_GET["alerta"])){
    $msgAlerta = "<p class='alertas'>SUCESSO!</p>";
}
else{
    $msgAlerta = "";
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
    <?php include("includes/webpage/nav.php") ?>
    <!-- NAV -->
    <div id="content">
        <?php echo $msgAlerta; ?>
        <?php
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){                    
                    $albm = $row["album_m"];
                    $nAlbm = clean($albm);

                    echo '<div class="box">';
                    if(file_exists('media/'.$nAlbm.'.jpg')){
                        echo '<img class="songImg" src="media/'.$nAlbm.'.jpg" alt="default album cover">';
                    }
                    else{
                        echo '<img class="songImg" src="media/default-album-art.jpg" alt="default album cover">';
                    }
                    echo    '<div class="songInfo">';
                    echo        '<p class="songTitle" title="'.$row["nome_m"].'">'.$row["nome_m"].'</p>';
                    echo        '<p class="songArtist">'.$row["artista_m"].'</p>';
                    echo        '<p class="songAlbum">'.$row["album_m"].'</p>';
                    echo        '<p class="songYear">'.$row["ano_m"].'</p>';
                    echo    '</div>';
                    echo '</div>';
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