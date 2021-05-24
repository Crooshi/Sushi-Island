<?php
    include_once 'header.php';
    require 'includes/db.inc.php';   
?>
    <section>
    <?php include_once 'header-admin.php'; ?>
   <div class="container">
    <h2 class="admin-title">Gestions des Catégories</h2>
        <?php
            if(isset($_GET["erreur"])){
                if($_GET["erreur"] == "supp"){
                    echo "<p class='erreur-message'> Catégorie supprimée !</p> ";
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
                <a href="./delete-categorie.php?id=<?= $c['id_categorie']?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
        </tbody>
        <?php
        endforeach;
        ?>
        </table>

    </div>
    </section>
<?php
    include_once 'footer.php';
?>