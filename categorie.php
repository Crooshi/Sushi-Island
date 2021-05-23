<?php
    include_once 'header.php';
    require 'includes/db.inc.php';

?>

    <section class="food-menu">
    <ul class="nav justify-content-center bg-light">
        <?php 
            $categorie  = $bdd->query('SELECT * FROM categorie');
            foreach($categorie as $c) :    ?>        
            <li class="nav-item px-5">
                <a class="nav-link" href="./categorie-food.php?categorie_id=<?= $c["id_categorie"] ?>"><?= $c['libelle'] ?></a>
            </li>
    <?php endforeach; ?>         
    </ul>

    </section>        



<?php
    include_once 'footer.php';
?>