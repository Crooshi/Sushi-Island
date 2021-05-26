<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
    <section>
    <?php include_once 'header-admin.php'; ?>
   <div class="container">
    <h2 class="admin-title">Gestions des Catégories</h2>
        <?php
        if(isset($_GET['delete'])){
            if($_GET['delete'] == 'ok'){
                echo"<div class='alert alert-success'> La Catégorie a bien été supprimée !</div>";
            }
        }
        ?>
        <a href="./add-categorie.php" class="btn btn-outline-dark">Ajouter une catégorie</a>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Libelle</th>
            <th scope="col">Active</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
         <?php
            $categorie  = $bdd->query('SELECT * FROM categorie');
            $i=1;
            foreach($categorie as $c) :
        ?>
        <tbody>
            <tr>
            <th scope="row"><?= $i++?></th>
            <td><?= $c['libelle']?></td>
            <td><?= $c['active']?></td>
            <td>  <a href="./update-categorie.php?id=<?= $c['id_categorie']?>" class="btn btn-secondary">Modifier</a>
                <a href="./delete-categorie.php?id=<?= $c['id_categorie']?>" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment effectuer cette action ?')">Supprimer</a></td>
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
       echo "vous n'avez pas accès à cette page";
   } 
    include_once 'footer.php';
?>