<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('autres_page/header.php')?>
</head>
<body>
    <?php
        require('conf/conf.inc.php');
        require('autres_page/menu.php');
    ?>
    <style>
        form{
            display:flex;
            flex-direction:column;
            align-items:center;
        }
    </style>
    <!-- <form action="verif_connexion.php" method="post">
        <input type="text" name="client_mail" placeholder="email">
        <input type="password" name="mot_de_passe" placeholder="mot de passe">
        <input type="submit" value="connexion">
    </form> -->

    <div id="connexion-form-container">
        <form class="form" action="verif_connexion.php" method="post">
           <p class="form-title">Vous connecter à votre compte</p>
            <div class="input-container">
              <input placeholder="Votre mail" type="email" name="client_mail">
              <span>
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
              </span>
          </div>
          <div class="input-container">
              <input placeholder="Mot de passe" type="password" name="mot_de_passe">
        
              <span>
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                  <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
              </span>
            </div>
                <input type="submit" value="Se connecter" class="submit">
          </button>
        
          <p class="signup-link">
            Pas de compte ?
            <a href="inscription.php">S'inscrire</a>
          </p>
        </form>
    </div>
    

    <?php
        require('autres_page/footer.php');
    ?>
</body>
</html>