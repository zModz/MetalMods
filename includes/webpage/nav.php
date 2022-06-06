<div id="nav">
    <div class="navItns">
        <a class="navItm"></a>
        <a class="navItm" href="index.php">Albuns</a>
        <img class="navItm" id="imgLogo" src="media/MM_Logo.png" alt="logo image" srcset="">
        <a class="navItm" href="editar.php">Artistas</a>
    </div>
    <div class="loginItm">
    <?php
        if(isset($_SESSION['user'])){
            $user=$_SESSION['user'];
            $msgLog = "<p class='logP2'>Benvindo $user - <a href='includes/webpage/logout.php'>logout</a></p>";
            echo $msgLog;
        }
        else{
            echo'<button id="loginBtn" class="navItm">Login/Register</button>';
        }
    ?>
    </div>
</div>
<?php include("includes/webpage/modal.php"); ?>