<?php
    $host = "localhost"; 
    $user = "Lea"; 
    $mdp = "test"; 
    $bdd = "site"; 

    $conn = mysqli_connect($host, $user, $mdp, $bdd);

    if (!$conn){
        die ("Impossible de connecter " . mysqli_connect_error()) ;
    }   
    
