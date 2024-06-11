<?php
    ini_set('display_errors',1);
    require('model/Connexion_model.php');

    function index(){
        require('view/autres_page/header.php');
        require('view/autres_page/menu.php');
        require('view/connexion_view.php');
        require('view/autres_page/footer.php');
    }
    
    //la function connexion nous permet de vérifier si l'utilisateur est bien connecté
    function verif_connexion(){
        
        //on vérifie si les champs sont bien remplis
        if(isset($_POST['client_mail']) && isset($_POST['mot_de_passe']))
        {
            //on uilise la fonction verif_utilisateur du modèle connexion_model
            $resultat=verif_utilisateur($_POST['client_mail']);
        
            //on vérifie si le login et le mot de passe sont corrects avec le hash du mot de passe
            if($resultat['user_email']==$_POST['client_mail'] && password_verify($_POST['mot_de_passe'],$resultat['user_pwd']))
            {
                //si c'est le cas, on crée une session pour l'utilisateur
                session_start();
                $_SESSION['client_username']=$resultat['user_username'];
                //on affiche un message de connexion réussie
                header('Location: /');
            }
            else
            {
                //on affiche un message d'erreur si le login ou le mot de passe sont incorrects
                header('Location: /connexion');
            }
            
        }
        else
        {
            //si les champs ne sont pas remplis
            header('Location: /connexion');
        }
    }
    
    function deconnexion(){
        session_start();
        session_destroy();
        header('Location: /');
    }

    //inscription d'un client
    function validation_inscription()
    {
        //on vérifie si les champs sont bien remplis
        if(isset($_POST['client_mail']) && isset($_POST['mot_de_passe']) && isset($_POST['mot_de_passe2']) && isset($_POST['client_nom']) && isset($_POST['client_prenom'])&& isset($_POST['client_tel'])&& isset($_POST['client_genre']))
        {
            //on vérifie si les deux mots de passe sont identiques
            if($_POST['mot_de_passe']==$_POST['mot_de_passe2'])
            {
                //on vérifie si l'utilisateur existe déjà
                $resultat=verif_utilisateur($_POST['client_mail']);
                
                if(!$resultat)
                {   
                    // $image_before=file_get_contents($_FILES['image']['tmp_name']);
                    // $image_base64=base64_encode($image_before);
                    // $base64ImageWithMime = 'data:image/jpeg;base64,' . $image_base64;
                    //on hash le mot de passe
                    $mdp=password_hash($_POST['mot_de_passe'],PASSWORD_DEFAULT   );
                    //on crée un nouvel utilisateur
                    inscription_utilisateur($_POST['client_mail'],$mdp,$_POST['client_nom'],$_POST['client_prenom'],$_POST['client_tel'],$_POST['client_genre'],$_POST['client_age'],$_POST['client_username']);
                    //on crée une session pour l'utilisateur
                    session_start();
                    $_SESSION['client_username']=$_POST['client_username'];
                    //on redirige l'utilisateur vers la page d'accueil
                    echo 'utilisateur créé';
                    header('location: /index.php');
                }
                else
                {
                    //si l'utilisateur existe déjà, on redirige l'utilisateur vers la page d'inscription
                    
                    echo 'utilisateur existe déjà';
                    header('Location: /');
                }
            }
            else
            {
                //si les deux mots de passe ne sont pas identiques, on redirige l'utilisateur vers la page d'inscription
                echo 'mots de passe différents';
                header('Location: /');
            }
        }
        else
        {
            //si les champs ne sont pas remplis, on redirige l'utilisateur vers la page d'inscription
            header('Location: /');
        }
    }

    function inscription(){
        require('view/autres_page/header.php');
        require('view/autres_page/menu.php');
        require('view/inscription_view.php');
        require('view/autres_page/footer.php');
    }
    
?>