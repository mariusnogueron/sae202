<?php
ini_set('display_errors',1);
?>

<header>
    <img src="assets/img/fleur.svg" alt="logo" id="logo">
    <?php
    session_start();
    if(isset($_SESSION['client_username'])){
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
        echo '<div class="flex bg-dark_green text-center justify-center gap-5 py-10 ">
            <img src="assets/img/fleur.svg" class="w-28" alt="">
            <h1 class="text-olive uppercase flex items-center text-9xl font-nerko">potage</h1>
            <div class="flex"> 
                <a href="connexion.php"><button class="text-dark_green absolute right-0  uppercase bg-white font-nerko px-3 py-1 rounded-l-lg text-4xl">se connecter</button></a>
            </div>
        </div>';
        echo '<div class="flex bg-guacamole justify-around rounded-b-3xl ">
            <div class="list-none font-nerko text-white uppercase text-4xl w-full flex py-5 justify-around">
                <a href="" class="text-dark_green">accueil</a>
                <a href="jardin.php">jardin potager</a>
                <a href="">contacts</a>
                <a href="profil.php">profil</a>
            </div>
        </div>';
    }
    ?>
    <img src="" alt="">
</header>