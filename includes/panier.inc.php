<?php
    require 'db.inc.php';

    function creationPanier(){
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
            $_SESSION['panier']['titre'] = array();
            $_SESSION['panier']['prix'] = array();

    }

    }
    


?>