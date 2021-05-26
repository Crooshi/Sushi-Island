<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
    <section>
    <?php include_once 'header-admin.php'; ?>
   <div class="container">
    <h2 class="admin-title">Gestions des Commandes</h2>
     <?php
        if(isset($_GET['update'])){
            if($_GET['update'] == 'ok'){
                echo"<div class='alert alert-success'> La commande a bien été traitée !</div>";
            }
        }
    ?>
    <?php
        if(isset($_GET['delete'])){
            if($_GET['delete'] == 'ok'){
                echo"<div class='alert alert-success'> La commande a bien été supprimée !</div>";
            }
        }
        ?>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du client</th>
            <th scope="col">Mail du client</th>
            <th scope="col">Montant</th>
            <th scope="col">Date</th>
            <th scope="col">Etat de la commande</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
         <?php
            $commande  = $bdd->query('SELECT * FROM commande');
            $i=1;
            foreach($commande as $c) :
        ?>
        <tbody>
            <tr>
            <th scope="row"><?= $i++?></th>
            <td><?= $c['nom_commande']?></td>
            <td><?= $c['mail_commande']?></td>
            <td><?= $c['montant']?> €</td>
            <td><?= $c['date_commande']?></td>
            <td><?php if($c['etat_commande'] == 0){?>
                En cours de traitement
            <?php } else{ ?>Traité <?php }?></td>
            <td>  <a href="./update-order.php?id=<?= $c['id_commande']?>" class="btn btn-secondary">Traiter la commande</a>
                <a href="./delete-order.php?id=<?= $c['id_commande']?>" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment effectuer cette action ?')">Annuler la commande</a>
            </tr>
        </tbody>
        <?php
        endforeach;
        ?>
        </table>

    </div>
    </section>
<?php
   }
   else{
       echo "<div class='alert alert-danger'>Vous n'avez pas accès à cette page</div>";
   } 
    include_once 'footer.php';
?>