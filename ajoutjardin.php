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
    <div id="form-container">
        <form action="valid_ajoutjardin.php" method="post" enctype="multipart/form-data">
            <input type="text" name="jardin_nom" placeholder="Nom du Jardin">
            <input type="text" name="jardin_adr" placeholder="Adresse du Jardin">
            <input type="text" name="jardin_surf" placeholder="Surface du Jardin">  
            <label for="image">Photo du jardin</label>
            <input type="file" name="image" id="image"/>
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>