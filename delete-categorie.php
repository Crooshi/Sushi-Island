<?php
    require 'includes/db.inc.php';   

     
    $id =$_GET['id'];
    $req  = "DELETE FROM categorie WHERE id_categorie=$id";
    $stmt = $bdd->prepare($req);
    $stmt->execute();


    header('location:./admin.php?erreur=supp');


?>