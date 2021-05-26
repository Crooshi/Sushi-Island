<?php
    require 'includes/db.inc.php';   

    
    $id =$_GET['id'];
    $req  = "DELETE FROM utilisateur WHERE id_user=$id";
    $stmt = $bdd->prepare($req);
    $stmt->execute();

    if($stmt ==true){
        $_SESSION['delete'] = "<div class='alert alert-success'> L'Admin a bien été supprimé !</div> ";
        header('location:./manage-admin.php');
    }


?>