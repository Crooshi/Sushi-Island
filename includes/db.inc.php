 <?php


    $dsn = 'mysql:dbname=site;host=localhost';
    $user = 'root';
    $password = 'root';

    try{
        $bdd = new PDO($dsn, $user, $password);

    }
    catch(PDOException $e){
        echo 'Connexion impossible : ' . $e->getMessage(); 
    }

?>