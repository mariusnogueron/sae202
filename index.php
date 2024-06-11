<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('autres_page/header.php');?>
    <title>Accueil Potage</title>
    
    
</head>
<body class="bg-light_green">

<!-- <div class="fixed w-full top-0"> -->
    <?php
        require('conf/conf.inc.php');
        require('autres_page/menu.php')
        
    ?>
<div class="h-svh">

<div class="">
    <!-- <img src="assets/img/noise_blob_1.svg" alt="" -->
</div>
<div class="">
    <h2 class="font-nerko text-7xl text-dark_green">Présentation</h2>
    <span class="font-love text-guacamole text-4xl">Qui sommes nous ?</span>
</div>
        <p class="text-xl">
            Bienvenue sur Potage ! 

Une application qui propose un service de co-jardinage dédié aux amateurs et aux passionnés de jardinage pour la Ville de Troyes. 
<br><br>Tout le monde sait que jardiner seul, ça peut être parfois coûteux et ennuyant ! Alors 1 seul objectif : l’entraide et le partage ! Chez Potage, nous mettons en relation des propriétaires de jardins avec des jardiniers, afin de transformer ces jardins en des espaces partagés pour cultiver ensemble !

Notre application est conçue pour être intuitive et facile à utiliser. Que vous soyez propriétaire d’un jardin ou jardinier à la recherche d’un espace, Potage vous guide !
Vous pouvez voir les jardins disponibles autour de vous, choisir celui qui vous convient et entrer en contact avec le propriétaire pour demander le co-jardinage
L'expérience utilisateur est au cœur de notre développement. Que vous accédiez à notre site depuis un ordinateur chez c-vous ou un téléphone, vous pourrez naviguer simplement sur l’application. 
        </p>
</div>

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

