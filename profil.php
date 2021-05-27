<?php 
    include_once 'header.php';
    require 'includes/db.inc.php';

?>  
<div class="container">

    <h2 class="admin-title">Mon profil</h2>
    <?php 
    $id=$_GET['id'];
    $res = $bdd->query("SELECT count(*) as nb FROM commande WHERE id_user=$id");
    $data = $res->fetch();
    $nb = $data['nb'];
    if($nb>0) {?> 
    <p class="fw-bold fw-bold">Vous avez fait <?= $nb ?> commandes.</p>
    <?php } else{?> 
    <p class="fw-bold fw-bold">Vous n'avez fait aucune commande.</p>
    <?php } ?>
    <a class="btn btn-info" href="./update-profil.php?id=<?= $id ?>" role="button">Modifier mon Profil</a>

</div>
    
<?php 
    include_once 'footer.php';
?>  