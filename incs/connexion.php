<?php
$title = 'Se connecter';
$errors = array();
  //form soumis
if (!empty($_POST['coonect_submit'])) {
  //Protection XSS
  $login = trim(strip_tags($_POST['login']));
  $password = trim(strip_tags($_POST['password']));
  //vérification dans la base de données
  $sql ="SELECT * FROM user WHERE pseudo = :login OR email=:login";
    $query = $pdo->prepare($sql);
    $query -> bindValue(':login',$login,PDO::PARAM_STR);
    $query -> execute();
  $user = $query ->fetch();
    if (!empty($user)) {
      if (!password_verify($password,$user['password'])) {
        $errors['password'] = 'mauvais mot de passe';
      }
    }else $errors['login'] = 'Veuillez vous inscrire';
    if (count($errors) == 0) {
        $_SESSION['user'] = array(
          'id' => $user['id'],
          'name' => $user['name'],
          'email' => $user['email'],
          'ip' => $_SERVER['REMOTE_ADDR'],
        );
        header('Location: dashboard.php');

      }
    }
?>
