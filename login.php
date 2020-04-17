<?php
session_start();
require_once("config/database.php");

?>

<?php

if(isset($_POST['connexion'])){
    $usernameCo = htmlspecialchars($_POST['usernameCo']);
    $passwordCo = sha1($_POST['passwordCo']);
    if(!empty($usernameCo) AND !empty($passwordCo)){
        $reqUser = $dbh->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $reqUser->execute(array($usernameCo, $passwordCo));
        $userExist = $reqUser->rowCount();
        if($userExist == 1){
            $userInfo = $reqUser->fetch();
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['username'] = $userInfo['username'];
            header("Location: accueil.php?id=".$_SESSION['id']);
        }else{
            $erreur = "Mauvais pseudo ou mot de passe";
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
    <h1>Connexion</h1>
    <form action="" method="POST">
    
    <input type="text" name="usernameCo" placeholder="Votre pseudo">
    <input type="password" name="passwordCo" placeholder="Votre mot de passe">
    <input type="submit" name="connexion" value="Se connecter">
    </form>
    <a href="inscription.php">S'inscire</a>
    <?php
    
    if(isset($erreur)){
        echo $erreur;
    }

    ?>
</body>
</html>
