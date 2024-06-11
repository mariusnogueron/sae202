<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('autres_page/header.php'); ?>
    <title>Nos jardins</title>
</head>
<body class="bg-light_green">
    <?php 
    require('conf/conf.inc.php');
    require('autres_page/menu.php');?>
    <div id="contenu">
        <h1>Bienvenue sur la page de nos jardins</h1>
        <h2>Vous souhaitez partager votre jardin ? <a href="ajoutjardin.php">Partager</a></h2>
    </div>
    <style>
        #jardins{
            display:grid;
            grid-template-columns: repeat(3, 1fr);
            width: 80%;
            margin: 0 auto;
        }
        .jardin_img{
            width:150px;
            height:150px;
            background-size: cover;
            background-position: center;
            }
        .jardin{
            display:flex;
            justify-content:center;
            flex-direction:column;
        }
    </style>
    <div id="jardins">
        <?php

            $client_username= $_SESSION['client_username'];
            $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
            $req = "SELECT * FROM Jardins";
            $resultat = $db->query($req);
            foreach ($resultat as $jardin) {
                echo '<div class="jardin">';
                    echo '<div class="jardin_img" style="background-image: url(assets/img/jardins/'.$jardin['jardin_image'].')">  </div>';
                    echo 'Nom du jardin : '.$jardin['jardin_nom'].'<br>';
                    echo 'Adresse du jardin : '.$jardin['jardin_coord'].'<br>';
                    echo 'Surface du jardin : '.$jardin['jardin_surf'].'m²';
                    echo '<input type="submit" value="réserver" style="width:70px;">';
                echo '</div>';
            }

        ?>

    </div>
    <?php
    require('autres_page/footer.php');
?>
</body>
</html>
