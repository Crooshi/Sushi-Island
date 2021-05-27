<?php
    include_once 'header.php';
    require 'includes/db.inc.php';

?>

    <section class="food-menu">
    <ul class="nav justify-content-center bg-light">
        <?php 
            $categorie  = $bdd->query("SELECT * FROM categorie WHERE active='Oui'");
            foreach($categorie as $c) :    ?>        
            <li class="nav-item px-5">
                <a class="nav-link" href="./categorie-food.php?categorie_id=<?= $c["id_categorie"] ?>"><?= $c['libelle'] ?></a>
            </li>
    <?php endforeach; ?>         
    </ul>
    <div class="container">
        <div class="food-search">
        <form action="food-search.php" method="POST" >
            <input type="search" name="search" class="form-control" placeholder="Cherchez ce qu'il vous ferais plaisir !" required>
            <input type="submit" name="submit" value="Rechercher" class="btn btn-primary btn-search">
        </form>   
        </div> 
    <h2 class="admin-title"> Un aperçu : </h2>    
    <div class="food-menu-container">
     <?php 
            $produit  = $bdd->query("SELECT * FROM produit LIMIT 3");
           if($produit->rowCount() > 0) {
            while($p = $produit->fetch()) {?>
            
                <div class="food-menu-item">
                <div class="food-image">
                    <img src="img/<?= $p['photo']?>" alt="...">
                </div>
                <div class="food-description">
                    <h2 class="food-title"><?= $p['titre']?></h2>
                    <p class='text-break'><?= $p['description']?></p>
                    <p class="food-price">Prix : <?= $p['prix']?> €</p>
                    <a href="addpanier.php?id=<?= $p["id_produit"] ?>" class="btn btn-primary">Ajouter au panier </a>
                </div>
            </div>
                 <?php }
           }
        else{ echo "<p class='no-result'>Pas de produits disponible dans cette catégorie pour l'instant !</p>";}
        ?>
        </div>   

    </div>    
    </section>        



<?php
    include_once 'footer.php';
?>