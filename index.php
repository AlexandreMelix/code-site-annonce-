<?php
require_once("config/database.php");

?>

<?php 

if(isset($_POST['inscription'])){
   if(!empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['passwordConf'])){
       $username = htmlspecialchars($_POST['username']);
       $password = sha1($_POST['password']);
       $passwordConf = sha1($_POST['passwordConf']);

       $usernameLenght = strlen($username);
       if($usernameLenght <= 255){
            if($password == $passwordConf){
                $insertUser = $dbh->prepare('INSERT INTO user(username, password) VALUES (?,?)');
                $insertUser->execute(array($username, $password));
                $erreur = "Votre compte à bien été créé";
            }else{
                $erreur = "Vos mots de passe ne sont pas identiques";
            }
       }else{
           $erreur = "Votre pseudo ne doit pas dépasser 255 caractères";
       }
   }else{
       $erreur = "Tous les champs doivent être complétés";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="" method="POST">
    
    <input type="text" name="username" placeholder="Votre pseudo">
    <input type="text" name="password" placeholder="Votre mot de passe">
    <input type="text" name="passwordConf" placeholder="Confirmez votre mot de passe">
    <input type="submit" name="inscription" value="inscription">
    </form>
    <a href="login.php">Se Connecter</a>
    <?php
    
    if(isset($erreur)){
        echo $erreur;
    }

    ?>
</body>
</html>
