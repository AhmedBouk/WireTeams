<?php
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT file_url FROM files  WHERE id=$id  ";

// preparation de la requête
    $query = $pdo->prepare($sql);
// Protection injections SQL
    $query->bindValue(':id', $id, PDO::PARAM_STR);
// execution de la requête preparé
    $query->execute();
    $analyse = $query->fetch();
// var_dump($analyse);
    $jsonData = file_get_contents($analyse['file_url']);
// var_dump($data['name']);

    $jsons = json_decode($jsonData, true);

}

$protocols = array();

?>