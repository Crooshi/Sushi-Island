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
    <h2 class="admin-title"> Les + commandés : </h2>    

    <div class="card col-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        </div>
    </div>    
    </section>        



<?php
    include_once 'footer.php';
?>