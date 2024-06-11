<?php
    
    require('model/Jardin_model.php');
    function index(){
        require('view/autres_page/header.php');
        require('view/autres_page/menu.php');
        require('view/jardin_view.php');
        require('view/autres_page/footer.php');
    }

?>