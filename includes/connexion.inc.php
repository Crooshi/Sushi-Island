<?php

    if(isset($_POST["submit"])){
        
        $email= $_POST["email"];
        $mdp= $_POST["mdp"];


        require_once 'db.inc.php';
        require_once 'functions.inc.php';


        loginUser($conn, $email, $mdp);

    }
    else{
        header("location: ../connexion.php");
        exit();
    }