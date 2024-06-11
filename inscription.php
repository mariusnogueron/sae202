<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('autres_page/header.php')?>
</head>
<body>
    <?php
    require('conf/conf.inc.php');
    require('autres_page/menu.php')?>
    <style>
        form{
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        #form-container{
            display:flex;
            justify-content:center;
            align-items:center;
            height:40vh;
        }
    </style>
    <div id="form-container">
        <form action="validation_inscription.php" method="post" enctype="multipart/form-data">
            <input type="text" name="client_nom" placeholder="nom">
            <input type="text" name="client_prenom" placeholder="prenom">
            <input type="text" name="client_username" placeholder="Nom d'utilisateur">  
            <input type="text" name="client_mail" placeholder="email">
            <input type="password" name="mot_de_passe" placeholder="mot de passe">
            <input type="password" name="mot_de_passe2" placeholder="confirmer mot de passe">
            <input type="text" name="client_tel" placeholder="téléphone">  
            <input type="text" name="client_age" placeholder="age">  
            <input type="text" name="client_genre" placeholder="genre">
            <label for="image">Photo de profil</label>
            <input type="file" name="image" id="image"/>
            <input type="submit" value="inscription">
        </form>
    </div>
</body>
</html>