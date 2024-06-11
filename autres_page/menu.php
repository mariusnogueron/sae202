<?php
ini_set('display_errors',1);
?>

<header>
    <img src="assets/img/fleur.svg" alt="logo" id="logo">
    <?php
    session_start();
    if(isset($_SESSION['client_username'])){
        // require('conf/conf.inc.php');
        $client_username= $_SESSION['client_username'];
        $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
        //la requête
        $req = $db->query("SELECT user_photo FROM Users WHERE user_username= '$client_username' ");
        //on récupère le résultat
        $resultat = $req->fetch();
        echo'
        <nav>
            <a href="/">Accueil</a>
            <a href="jardin.php">Jardins</a>
            <a href="#">Contact</a>
            <a href="admin/admin.php">Admin</a>
        </nav>';
        echo '<div id="connexion-link"><a href="profil.php"><img src='.$resultat['user_photo'].' alt="" id="profile_picture">'.$_SESSION['client_username'].'</a><a href="deconnexion.php" id="deconnexion"> Deconnexion</a></div>';
    }else{
        echo'
        <nav>
            <a href="/">Accueil</a>
            <a href="#">Contact</a>
            <a href="admin/admin.php">Admin</a>
        </nav>';
        echo '<div id="connexion-link"><a href="connexion.php" id="connexion">Connexion</a></div>';
    }
    ?>
    <img src="" alt="">
</header>