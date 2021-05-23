 <?php
/*     $host = "localhost"; 
    $user = "Lea"; 
    $mdp = "test"; 
    $bdd = "site"; 

    $conn = mysqli_connect($host, $user, $mdp, $bdd);

    if (!$conn){
        die ("Impossible de connecter " . mysqli_connect_error()) ;
    }   
     */

    $dsn = 'mysql:dbname=site;host=localhost';
    $user = 'Lea';
    $password = 'test';

    try{
        $bdd = new PDO($dsn, $user, $password);

    }
    catch(PDOException $e){
        echo 'Connexion impossible : ' . $e->getMessage(); 
    }

?>