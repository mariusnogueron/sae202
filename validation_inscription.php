<?php
        require('conf/conf.inc.php');
        function inscription_utilisateur($client_mail,$client_mdp,$client_nom,$client_prenom,$client_tel,$client_genre,$client_age,$client_username,$client_photo)
        {
            //on se connecte à la base de données
            $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
            //on execute la requete
            $req = $db->query('INSERT INTO Users(user_email,user_pwd,user_nom,user_prenom,user_tel,user_genre,user_age,user_username,user_photo) VALUES ("'.$client_mail.'","'.$client_mdp.'","'.$client_nom.'","'.$client_prenom.'","'.$client_tel.'","'.$client_genre.'","'.$client_age.'","'.$client_username.'","'.$client_photo.'")');
            return $req;
        }

        function verif_utilisateur($client_mail)
        {
            //on se connecte à la base de données
            $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
            //la requête
            $req = $db->query("SELECT * FROM Users WHERE user_email= '$client_mail' ");
            //on récupère le résultat
            $resultat = $req->fetch();
            //on retourne le résultat
            return $resultat;
        }


        if(isset($_POST['client_mail']) && isset($_POST['mot_de_passe']) && isset($_POST['mot_de_passe2']) && isset($_POST['client_nom']) && isset($_POST['client_prenom']) && isset($_POST['client_tel']) && isset($_POST['client_genre']) && isset($_FILES['image'])) {
            // vérifie si mdp identiques
            if($_POST['mot_de_passe'] == $_POST['mot_de_passe2']) {
                // On vérifie si l'utilisateur existe déjà
                $resultat = verif_utilisateur($_POST['client_mail']);
                
                if(!$resultat) {
                    // On hash le mot de passe
                    $mdp = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
                    
                    // Traitement de l'image
                    $target_dir = "assets/img/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $uploadOk = 1;
        
                    // Vérifiez si le fichier image est une image réelle ou une fausse image
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo "Le fichier n'est pas une image.";
                        $uploadOk = 0;
                    }
        
                    // Vérifiez si le fichier existe déjà
                    if (file_exists($target_file)) {
                        echo "Désolé, le fichier existe déjà.";
                        $uploadOk = 0;
                    }
        
                    // Vérifiez la taille du fichier
                    if ($_FILES["image"]["size"] > 500000) { // 500 KB
                        echo "Désolé, votre fichier est trop volumineux.";
                        $uploadOk = 0;
                    }
        
                    // Autoriser certains formats de fichier
                    // if($imageFileType != "jpg" && $imageFileType != "jpeg") {
                    //     echo "Désolé, seuls les fichiers JPG, JPEG sont autorisés.";
                    //     $uploadOk = 0;
                    // }
        
                    // Vérifiez si $uploadOk est mis à 0 par une erreur
                    if ($uploadOk == 0) {
                        echo "Désolé, votre fichier n'a pas été téléchargé.";
                    // Si tout est ok, essayez de télécharger le fichier
                    } else {
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            echo "Le fichier ". htmlspecialchars(basename($_FILES["image"]["name"])) . " a été téléchargé.";
        
                            // On crée un nouvel utilisateur
                            inscription_utilisateur($_POST['client_mail'], $mdp, $_POST['client_nom'], $_POST['client_prenom'], $_POST['client_tel'], $_POST['client_genre'], $_POST['client_age'], $_POST['client_username'], $target_file);
        
                            // On crée une session pour l'utilisateur
                            session_start();
                            $_SESSION['client_username'] = $_POST['client_username'];
                            // On redirige l'utilisateur vers la page d'accueil
                            header('Location: /index.php');
                        } else {
                            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                        }
                    }
                } else {
                    // Si l'utilisateur existe déjà, on redirige l'utilisateur vers la page d'inscription
                    echo 'Utilisateur existe déjà';
                    header('Location: /');
                }
            } else {
                // si mdp pas identiques, redirige utilisateur vers inscription
                echo 'Mots de passe différents';
                header('Location: /');
            }
        } else {
            // si champs pas remplis, redirige utilisateur vers inscription
            header('Location: /');
        }

?>