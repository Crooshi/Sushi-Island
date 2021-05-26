<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
<?php include_once 'header-admin.php'; ?>

<div class="container">
<?php
    $id = $_GET['id'];
    if(isset($id)) {
        $traitement = $bdd->prepare("UPDATE commande SET etat_commande = 1 WHERE id_commande = $id");
        $traitement ->execute();
        header('Location: manage-order.php?update=ok');
?>
  
</div>
<?php   
}
else {
    header('Location: manage-admin.php');
}
?>

<?php
  }
   else{
       echo "<div class='alert alert-danger'> Vous n'avez pas accès à cette page </div>";
   } 
    include_once 'footer.php';
?>