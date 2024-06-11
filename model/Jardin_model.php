<?php

    require('view/jardin_view.php');
    
    require ('conf/conf.inc.php');

    function ajout_jardin(){
        $jardin_nom=$_POST['jardin_nom'];
        $jardin_adr=$_POST['jardin_adr'];
        $jardin_surf=$_POST['jardin_surf'];

        
        $imageType=$_FILES["image"]["type"];
        if ( ($imageType != "image/png") &&
            ($imageType != "image/jpg") &&
            ($imageType != "image/jpeg") ) {
                echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
                echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
                die();
        }

        //creation d'un nouveau nom pour cette image téléchargée
        // pour éviter d'avoir 2 fichiers avec le même nom
        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["image"]["name"];


        // dépot du fichier téléchargé dans le dossier /var/www/sae203/images/uploads
        if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], 
            "/view/assets/img/".$nouvelleImage)) {
                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
                die();
            }
        } else {
            echo '<p>Problème : image non chargée...</p>'."\n";
            die();
        }
        $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
        //on execute la requete
        $req = $db->query('INSERT INTO Jardins(jardin_nom,jardin_surf,jardin_coord,jardin_image) VALUES ("'.$jardin_nom.'","'.$jardin_surf.'","'.$jardin_adr.'","'.$nouvelleImage.'")');
        return $req;
    }
    
    // $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
    //     //la requête
    //     $req = $db->query("SELECT * FROM Jardin ");
    //     $resultat = $db->query($req);
    //     foreach ($resultat as $jardin) {
            
    // }