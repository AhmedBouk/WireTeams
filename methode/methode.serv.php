<?php

$errors =array();
$success = false;
if(!empty($_POST['submitted'])){

//faille XSS
$name = trim(strip_tags($_POST['name']));
$ip = trim(strip_tags($_POST['ip']));
$mask = trim(strip_tags($_POST['mask']));
$mac = trim(strip_tags($_POST['mac']));


// vérification name
if (!empty($name)) {
if (strlen($name) < 3){
$errors['name'] = 'Please enter a valid name';
}elseif (strlen($name) > 50){
$errors['name'] = 'Please enter a valid name';
}else {
$sql ="SELECT name FROM server WHERE name = :name";
$query = $pdo->prepare($sql);
$query -> bindValue(':name',$name,PDO::PARAM_STR);
$query -> execute();
$srvName = $query ->fetch();
if (!empty($srvName)) {
$errors['name'] = 'Name already used';
}
}
}else {
$errors['name'] = 'Please enter a valid name';
}

//vérification ip
if (!empty($ip)) {
if (!filter_var($ip,FILTER_VALIDATE_IP)) {
$errors['ip'] = 'Please enter a valid IP';
}else {
$sql ="SELECT ip FROM server WHERE ip = :ip";
$query = $pdo->prepare($sql);
$query -> bindValue(':ip',$ip,PDO::PARAM_STR);
$query -> execute();
$srvIp = $query ->fetch();
if (!empty($srvIp)) {
$errors['ip'] = 'Ip already used';
}
}
}else {
$errors['ip'] = 'Please enter a valid ip';
}


//vérification mask
if (!empty($mask)) {
if (!filter_var($mask,FILTER_VALIDATE_IP)) {
$errors['mask'] = 'Please enter a valid Network Mask';
}else {
$sql ="SELECT mask FROM server WHERE mask = :mask";
$query = $pdo->prepare($sql);
$query -> bindValue(':mask',$mask,PDO::PARAM_STR);
$query -> execute();
$srvMask = $query ->fetch();
if (!empty($srvMask)) {
$errors['mask'] = 'Network mask already used';
}
}
}else {
$errors['mask'] = 'Please enter a valid Network Mask';
}

// vérification mac
if (!empty($mac)) {
if (!filter_var($mac,FILTER_VALIDATE_MAC)) {
$errors['mac'] = 'Please enter a Mac address';
}else {
$sql ="SELECT mac FROM server WHERE mac = :mac";
$query = $pdo->prepare($sql);
$query -> bindValue(':mac',$mac,PDO::PARAM_STR);
$query -> execute();
$srvMac = $query ->fetch();
if (!empty($srvMac)) {
$errors['mac'] = 'Mac address already used';
}
}
}else {
$errors['mac'] = 'Please enter a valid Mac Address';
}

if (count($errors) == 0 ) {
$success = true;
$sql = "INSERT INTO server (name, ip, mask, mac) Values( :name, :ip, :mask, :mac)";
$query = $pdo->prepare($sql);
$query -> bindValue(':name',$name,PDO::PARAM_STR);
$query -> bindValue(':ip',$ip,PDO::PARAM_STR);
$query -> bindValue(':mask',$mask,PDO::PARAM_STR);
$query -> bindValue(':mac',$mac,PDO::PARAM_STR);
$query -> execute();
// echo "server ajouté";
}

// si pas d'erreurs INSERT INTO 'server' (name, ip, mask, mac) Values( :nom, :ip, :mask, :mac)


}
//requette d'affichage des serveurs
$sql = "SELECT * FROM server";
$query = $pdo -> prepare($sql);
$query -> execute();
$servers = $query -> fetchAll();

//requette de suppression
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
$id = $_GET['id'];
$sql = "SELECT id FROM server WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
$verifId = $query -> fetch();

//var_dump($verifId);



if (!empty($verifId)) {
$sql = "DELETE  FROM server WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
header('Location: dashboard.php');      //retourne à la page d'accueil
}
else {
// header('Location: ../404.php');
}
}
else {
// header('Location: ../404.php');
}

?>