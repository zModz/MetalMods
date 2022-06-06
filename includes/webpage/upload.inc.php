<?php

$file = $_FILES['cover'];

if (!empty($_FILES['cover']['name']))
{
    $fileName = $_FILES['cover']['name'];
    $fileTmpName = $_FILES['cover']['tmp_name'];
    $fileSize = $_FILES['cover']['size'];
    $fileError = $_FILES['cover']['error'];
    $fileType = $_FILES['cover']['type']; 

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'gif');
    if (in_array($fileActualExt, $allowed))
    {
        if ($fileError === 0)
        {
            if ($fileSize < 10000000)
            {
                $FileNewName = uniqid('', true) . "." . $fileActualExt;
                
                $fileDestination = './media'.$FileNewName;
                echo $fileDestination;
                move_uploaded_file($fileTmpName, $fileDestination);

            }
            else
            {
                header("Location: addAlbum.php?error=imgsizeexceeded");
                exit(); 
            }
        }
        else
        {
            header("Location: addAlbum.php?error=imguploaderror");
            exit();
        }
    }
    else
    {
        header("Location: addAlbum.php?error=invalidimagetype");
        exit();
    }
}

?>