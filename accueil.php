<?php
session_start();
require_once("config/database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bonjour <?php$_SESSION['username']?> !</h1>

<section class="all">
    <div class="listeAnnonce">
    <h2>Annonces disponibles</h2>
    </div>

    <div class="MesAnnonces">
        <h2>Mes annonces</h2>
        <a href="">Poster une annonce</a>
    </div>

</section>


    <?php
    
    if(isset($erreur)){
        echo $erreur;
    }

    ?>
</body>
</html>
