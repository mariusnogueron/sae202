<?php
    require('conf/conf.inc.php');
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
            header('Location: index.php');
        }
        else
        {
            //on affiche un message d'erreur si le login ou le mot de passe sont incorrects
            header('Location: connexion.php');
        }
        
    }
    else
    {
        //si les champs ne sont pas remplis
        header('Location: connexion.php');
    }

    
?>