<?php
    include_once 'header.php';
    require 'includes/db.inc.php';   
?>
    <section>
    <?php include_once 'header-admin.php'; ?>
   <div class="container">
    <h2 class="admin-title">Gestions des Produits</h2>
    <?php
        if(isset($_GET["erreur"])){
            if($_GET["erreur"] == "none"){
                echo "<p class='erreur-message'> Produit supprimé avec succès !</p> ";
            }
        }
    ?>
    <?php
     if(isset($_SESSION['upload'])){
         echo $_SESSION['upload'];
         unset($_SESSION['upload']);
     }
     ?>
    <?php
     if(isset($_SESSION['remove-failed'])){
         echo $_SESSION['remove-failed'];
         unset($_SESSION['remove-failed']);
     }
     ?>
        <a href="./add-produit.php" class="btn btn-outline-dark">Ajouter un produit</a>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Stock</th>
            <th scope="col">Image</th>
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
            <td><?= $p['prix']?>€</td>
            <td><?= $p['stock']?></td>
            <td><?php if ($p['photo']== ""){
                    echo "Pas d'image ajouté";
                    }
                    else{
                ?>
                    <img src="img/<?= $p['photo']?>" alt="<?= $p['titre']?>" width="100px">                      
                    <?php    
                    }

            ?></td>

            <td>  
                <a href="./update-produit.php?id=<?= $p['id_produit']?>" class="btn btn-secondary">Modifier</a>
                <a href="./delete-produit.php?id=<?= $p['id_produit']?>&image_name=<?= $p['photo']?>" class="btn btn-danger">Supprimer</a>
            </td>
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