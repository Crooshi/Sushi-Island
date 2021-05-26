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
<div class="container">
    <?php  $search = $_POST['search'];?>
    <h2 class="admin-title"> Resultat pour <?= $search ?> :</h2>    
    <?php
        $sql = $bdd->query('SELECT * FROM produit WHERE titre LIKE "%'.$search.'%" OR description  LIKE "%'.$search.'%"');
        if($sql->rowCount() > 0) {?>
        <ul>
        <?php while($a = $sql->fetch()) { ?>
             <div class="food-menu-container">
                <div class="food-menu-item">
                            <div class="food-image">
                               <?php if ($a['photo']== ""){
                                 echo "Pas d'image disponible";
                                }
                                else{
                            ?>
                            <img src="img/<?= $a['photo']?>" alt="<?= $a['titre']?>">                      
                            <?php    
                            }
                            ?>
                            </div>
                            <div class="food-description">
                                <h2 class="food-title"><?= $a['titre']?></h2>
                                <p><?= $a['description']?></p>
                                <p class="food-price">Prix : <?= $a['prix']?> €</p>
                                <a href="addpanier.php?id=<?= $a["id_produit"] ?>" class="btn btn-primary">Ajouter au panier </a>
                            </div>
                </div>             
            </div>
        <?php } ?>
        </ul>
        <?php } else { ?>
           <p class="alert alert-info"> Aucun résultat pour: <?= $search ?> Peut-être une prochaine fois ! </p>
           
        <?php } ?>
            <a class="btn btn-primary" href="./categorie.php" role="button">Retour à la page precédente !</a>

</div>

<?php
    include_once 'footer.php';
?>