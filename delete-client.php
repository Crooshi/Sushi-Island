<?php
    require 'includes/db.inc.php';   

    
    $id =$_GET['id'];
    $req  = "DELETE FROM utilisateur WHERE id_user=$id";
    $stmt = $bdd->prepare($req);
    $stmt->execute();

    if($stmt ==true){
        $_SESSION['delete'] = "<p class='erreur-message'> Client supprimé !</p> ";
        header('location:./manage-client.php');
    }


?>