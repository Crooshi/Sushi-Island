<?php
    require 'includes/db.inc.php';   

    
    $id =$_GET['id'];
    $req  = "DELETE FROM utilisateur WHERE id_user=$id";
    $stmt = $bdd->prepare($req);
    $stmt->execute();


    header('location:./admin.php?erreur=none');


?>