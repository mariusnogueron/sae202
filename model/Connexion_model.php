<?php

    require('view/connexion_view.php');
    
    //le model pour la connexion, nous permet de vérifier si l'utilisateur existe bien dans la base de données
    require ('conf/conf.inc.php');

    //une fonction pour vérifier si l'utilisateur existe bien dans la base de données
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
    function inscription_utilisateur($client_mail,$client_mdp,$client_nom,$client_prenom,$client_tel,$client_genre,$client_age,$client_username)
    {
        //on se connecte à la base de données
        $db= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
        //on execute la requete
        $req = $db->query('INSERT INTO Users(user_email,user_pwd,user_nom,user_prenom,user_tel,user_genre,user_age,user_username) VALUES ("'.$client_mail.'","'.$client_mdp.'","'.$client_nom.'","'.$client_prenom.'","'.$client_tel.'","'.$client_genre.'","'.$client_age.'","'.$client_username.'")');
        return $req;
    }
?>