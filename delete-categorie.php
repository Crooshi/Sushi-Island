<?php
    require 'includes/db.inc.php';   

    $id =$_GET['id'];
    $req  = "DELETE FROM commande WHERE id_commande=$id";
    $stmt = $bdd->prepare($req);
    $stmt->execute();

    header('location:./manage-order.php?delete=ok');
    exit();
   

?>