<?php
    include_once 'header.php';
    require 'includes/db.inc.php';   
?>
    <section>
    <?php include_once 'header-admin.php'; ?>
   <div class="container">
    <h2 class="admin-title">Gestions des Produits</h2>
        <a href="#" class="btn btn-outline-dark">Ajouter une catégorie</a>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <?php
            $produit  = $bdd->query('SELECT * FROM produit');
            $i=1;
            foreach($produit as $p) :
        ?>
        <tbody>
            <tr>
            <th scope="row"><?= $i++?></th>
            <td><?= $p['titre']?></td>
            <td><?= $p['description']?></td>
            <td>  
                <a href="#" class="btn btn-secondary">Modifier</a>
                <a href="#" class="btn btn-danger">Supprimer</a></td>
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