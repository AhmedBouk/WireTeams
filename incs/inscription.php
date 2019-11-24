<?php
$title = 'inscription';
$errors = array();
$success = false;
if (!empty($_POST['register_submit'])) {

  // Protection XSS
  $pseudo = trim(strip_tags($_POST['pseudo']));
  $email = trim(strip_tags($_POST['email']));
  $password = trim(strip_tags($_POST['password']));
  $password2 = trim(strip_tags($_POST['password2']));

  // vérification pseudo
    if (!empty($pseudo)) {
        if (strlen($pseudo) < 3){
            $errors['pseudo'] = 'Please enter a valid name';
        }elseif (strlen($pseudo) > 50){
            $errors['pseudo'] = 'Password too long';
        }else {
            $sql ="SELECT pseudo
                   FROM user
                   WHERE pseudo = :pseudo";
            $query = $pdo->prepare($sql);
            $query -> bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
            $query -> execute();
            $userPseudo = $query ->fetch();
        if (!empty($userPseudo)) {
              $errors['pseudo'] = 'Nickname already used';
            }
          }
        }else {
          $errors['pseudo'] = 'Please enter a valid name';
        }
        //vérification email
    if (!empty($email)) {
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email';
        }else {
            $sql ="SELECT email
                   FROM user
                   WHERE email = :email";
            $query = $pdo->prepare($sql);
            $query -> bindValue(':email',$email,PDO::PARAM_STR);
            $query -> execute();
            $userEmail = $query ->fetch();
        if (!empty($userEmail)) {
              $errors['email'] = 'Email already used';
            }
          }
        }else {
          $errors['email'] = 'Please enter a valid email';
        }

        //vérification password
    if (!empty($password) && !empty($password2)) {
        if ($password != $password2) {
            $errors['password'] = 'Your passwords are different';
        }elseif (strlen($password) < 5 ) {
            $errors['password'] = 'Your password is too short';
          }
        }else {
          $errors['password'] = 'Please enter a password';
        }


    if (count($errors) == 0 ) {
        $success = true;
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $token = generateRandomString();
        $sql ="INSERT INTO user (pseudo,email,token,password,created_at)
               VALUES (:pseudo,:email,'$token',:password,NOW())";
        $query = $pdo->prepare($sql);
        $query -> bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        $query -> bindValue(':email',$email,PDO::PARAM_STR);
        $query -> bindValue(':password',$hash,PDO::PARAM_STR);
        $query -> execute();




    }
}

?>

