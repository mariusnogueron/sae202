<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('autres_page/header.php');?>
    <title>Ajout Jardin</title>
</head>
<body>
    <?php
    require('conf/conf.inc.php');
    require('autres_page/menu.php');?>
    <h1>Vous venez d'ajouter un jardin</h1>
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
    <?php
        $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
        $req1 = $db->query("SELECT user_id FROM Users WHERE user_username= '$client_username' ");
        $resultat1= $req1->fetch();

        $nomJardin = $_POST['jardin_nom'];
        $adrJardin = $_POST['jardin_adr'];
        $surfJardin = $_POST['jardin_surf'];
        
        $user = $resultat1['user_id'];
        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["image"]["name"];

        if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], 
            "assets/img/jardins/".$nouvelleImage)) {
                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
                die();
            }
        } else {
            echo '<p>Problème : image non chargée...</p>'."\n"; 
            die();
        }
        $req2 = 'INSERT INTO Jardins(jardin_nom,jardin_surf,jardin_coord,jardin_image,_user_id) VALUES("'.$nomJardin.'",'.$surfJardin.',"'.$adrJardin.'","'.$nouvelleImage.'",'.$user.' )';
        // echo $req;
        $resultat2 = $db->query($req2);
    ?>
</body>
</html>