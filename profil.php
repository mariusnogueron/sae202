<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('autres_page/header.php'); ?>
    <title>Votre profil</title>
</head>
<body>
    <?php
    require('conf/conf.inc.php');
    require('autres_page/menu.php');
   $client_username= $_SESSION['client_username'];
   $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
   $req = $db->query("SELECT * FROM Users WHERE user_username= '$client_username' ");
   $resultat = $req->fetch();

   $user_id = $resultat['user_id'];
   $req2 = $db->query("SELECT COUNT(jardin_id) AS nb_jardins FROM Jardins WHERE _user_id = '$user_id'");
   $resultatJardin = $req2->fetch();
   // var_dump($resultatJardin);
   $nombreJardin = $resultatJardin['nb_jardins'];
        ?>
        <div id="profil-card">
            <form method="POST" action="profil_update.php">
                <div id="profil-pic-container">
                    <img src="<?php echo $resultat['user_photo'];?>" alt="" id="profile-page-pic">
                </div>
                <div class="card-header profil-input-centered">
                    <label for="image">Changer de photo de profil</label>
                </div>
                <div class="card-header profil-input-centered">
                    <input type="file" name="image" id="image"/>
                </div>
                <div class="profil-input-centered">
                    <input type="text" name="user_username"  value="<?php echo $resultat['user_username']; ?>">
                </div>
                <div class="profil-input-centered">
                    <input type="text" name="user_prenom" value="<?php echo $resultat['user_prenom']; ?>"><br>
                    <input type="text" name="user_nom" value="<?php echo $resultat['user_nom']; ?>"><br>
                </div>
                <div class="profil-input-centered">
                    <input type="text" name="user_email" value="<?php echo $resultat['user_email']; ?>"><br>
                    <input type="text" name="user_tel" value="<?php echo $resultat['user_tel']; ?>"><br>
                </div>
                <div class="profil-input-centered">
                    <input type="text" name="user_genre" value="<?php echo $resultat['user_genre']; ?>"><br>
                    <input type="text" name="user_age" value="<?php echo $resultat['user_age']; ?>"><br>
                </div>
                <h3>Nombre de jardin(s) : <?php echo $nombreJardin ?></h3>
                <input type="submit" value="Enregistrer les modifications">
            </form>
        </div>
</body>
</html>
