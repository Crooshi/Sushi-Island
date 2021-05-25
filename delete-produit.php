<?php
    require 'includes/db.inc.php';   

     
    $id =$_GET['id'];
    $image_name =$_GET['image_name'];
    
    if($image_name != ""){
        $path = "img/".$image_name;
        $remove = unlink($path);

        if($remove == false){
            $_SESSION['upload'] ="<div>Erreur lors de la supprision de l'image, veuillez réessayer plutard</div>";
            header('location:./manage-produit.php');
            die();
        } 
    }

    $req  = "DELETE FROM produit WHERE id_produit = $id";
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    
    header('location: ./manage-produit.php?erreur=none');
 
    
    


?>