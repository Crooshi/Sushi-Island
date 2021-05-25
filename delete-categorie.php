<?php
    require 'includes/db.inc.php';   

    $id =$_GET['id'];
    $req  = "DELETE FROM categorie WHERE id_categorie=$id";
    $stmt = $bdd->prepare($req);
    $stmt->execute();

    if($stmt ==true){
        $_SESSION['delete'] = "<p class='erreur-message'> Catégorie supprimée !</p> ";
        header('location:./manage-categorie.php');
     }

?>