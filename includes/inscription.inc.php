<?php

    if(isset($_POST["submit"])){

        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        $adresse = $_POST["adresse"];
        $ville = $_POST["ville"];
        $cp = $_POST["code_postal"];

        require_once 'db.inc.php';
        require_once 'functions.inc.php';

        if(userExists($conn, $email) !== false){
            header("location: ../inscription.php?error=userexist");
            exit();
        } 

        createUser($conn, $nom, $prenom, $email, $mdp, $adresse, $ville, $cp);

    }
    else {
        header("location: ../inscription.php");
    }