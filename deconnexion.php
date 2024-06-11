<?php
function deconnexion(){
    session_start();
    session_destroy();
    header('Location: /');   
}
deconnexion();
?>