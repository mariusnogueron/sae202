<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('autres_page/header.php');?>
    <title>Accueil Potage</title>
</head>
<body>
<?php
    require('conf/conf.inc.php');
    require('autres_page/menu.php');
    if(isset($_SESSION['client_username'])){
        echo'
        <div id="contenu">
            <h1>Bienvenue sur Potage.</h1>
            <h2>Un site de cojardinage, pour vous</h2>
            <h3>Vous souhaitez profiter d\'un jardin ou partager le vôtre ? <a href="jardin.php">Voir</a></h3>
            <div class="remarque"></div>
        </div>';
    }else{
        echo'
        <div id="contenu">
            <h1>Bienvenue sur Potage.</h1>
            <h2>Un site de cojardinage, pour vous</h2>
            <h3>Vous souhaitez profiter d\'un jardin ou partager le vôtre ? <a href="connexion.php">Se connecter</a></h3>
            <div class="remarque"></div>
        </div>';
        }
            ?>
<?php
    require('autres_page/footer.php');
?>
</body>
</html>