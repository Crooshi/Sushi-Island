<?php
    include_once 'header.php';
    require 'includes/db.inc.php';   

?>
    <ul class="nav justify-content-center bg-light">
        <?php 
            $categorie  = $bdd->query('SELECT * FROM categorie');
            foreach($categorie as $c) :    ?>        
            <li class="nav-item px-5">
                <a class="nav-link" href="./categorie-food.php?categorie_id=<?= $c["id_categorie"] ?>"><?= $c['libelle'] ?></a>
            </li>
        <?php endforeach; ?>         
    </ul>
    <?php
        if(isset($_GET["categorie_id"])){
            $categorie_id =$_GET["categorie_id"];
            $req = "SELECT * FROM categorie WHERE id_categorie=$categorie_id ";
        
            $stmt = $bdd->prepare($req);
            $stmt->execute();
            $categorie_titre = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else{
            header('location:./categorie.php');
        }

    ?>
    <h2 class="food-menu-heading"><?= $categorie_titre['libelle']?></h2>

        <?php 
            $produit  = $bdd->query("SELECT * FROM produit WHERE id_categorie=$categorie_id");
            foreach($produit as $p) :
        ?>
            <div class="food-menu-container">
                <div class="food-menu-item">
                            <div class="food-image">
                                <img src="img/<?= $p['photo']?>" alt="...">
                            </div>
                            <div class="food-description">
                                <h2 class="food-title"><?= $p['titre']?></h2>
                                <p><?= $p['description']?></p>
                                <p class="food-price">Prix : <?= $p['prix']?> €</p>
                                <a href=".addproduct.php?<?= $p["id_produit"] ?>" class="btn btn-primary">Commandez maintenant</a>
                            </div>
                </div>             
            </div>
        <?php endforeach; ?>
<?php
    include_once 'footer.php';
?>