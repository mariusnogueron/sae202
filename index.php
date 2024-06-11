<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('autres_page/header.php');?>
    <title>Accueil Potage</title>
    
    
</head>
<body class="bg-light_green">

<!-- <div class="fixed w-full top-0"> -->
<div class="flex bg-dark_green text-center justify-center gap-5 py-10 ">
    <img src="assets/img/fleur.svg" class="w-28" alt="">
<h1 class="text-olive uppercase flex items-center text-9xl font-nerko">potage</h1>
    <div class="flex"> 
        <button class="text-dark_green absolute right-0  uppercase bg-white font-nerko px-3 py-1 rounded-l-lg text-4xl">se connecter</button>

    </div>
    
</div>

<div class="flex bg-guacamole justify-around rounded-b-3xl ">
    <div class="list-none font-nerko text-white uppercase text-4xl w-full flex py-5 justify-around">
    <a href="" class="text-dark_green">accueil</a>
    <a href="jardin.php">jardin potager</a>
    <a href="">contacts</a>
    <a href="">profil</a>
    </div>
</div>
</div>



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
L’expérience utilisateur est au cœur de notre développement. Que vous accédiez à notre site depuis un ordinateur chez c-vous ou un téléphone, vous pourrez naviguer simplement sur l’application. 
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

