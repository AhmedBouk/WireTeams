<?php


if(!empty($_FILES)){
    $file_name = $_FILES['trame']['name'];
    $file_extension = strrchr($file_name, ".");

    $file_tmp_name = $_FILES['trame']['tmp_name'];

    $file_dest = 'files/'.$file_name;
    $extensions_autorisees = array('.json', '.JSON');

    if(in_array($file_extension, $extensions_autorisees)){
        if(move_uploaded_file($file_tmp_name, $file_dest)){
            $req = $pdo->prepare('INSERT INTO files(name, file_url) VALUES(?,?)');
            $req->execute(array($file_name, $file_dest));
            echo'fichier envoyé avec succès';
        } else {
            echo 'une erreur est survenue lors de l\'envoi du fichier';
        }

    }else {
        echo 'seul les fichiers json sont autorisés';
    }

}
require ('views/upload.view.php');
