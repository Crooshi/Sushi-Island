<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>

  <section>
       <?php include_once 'header-admin.php'; ?>
       <div class="container">
       
        <h2 class="admin-title">Dashbord</h2>
        <div class="dashbord-admin">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Ventes Totales</h5>
                <p class="card-text"> <?php
                    $res = $bdd->query("SELECT SUM(montant) as nb FROM commande");
                    $data = $res->fetch();
                    $nb = $data['nb'];
                    ?> <?= $nb ?> €</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Nombres de Catégories visibles</h5>
                <p class="card-text"> 
                    <?php
                    $res = $bdd->query("SELECT count(*) as nb FROM categorie WHERE active='Oui'");
                    $data = $res->fetch();
                    $nb = $data['nb'];
                    ?> <?= $nb ?></p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Total des commandes</h5>
                <p class="card-text"><?php
                    $res = $bdd->query("SELECT count(*) as nb FROM commande");
                    $data = $res->fetch();
                    $nb = $data['nb'];
                    ?> <?= $nb ?></p>
            </div>
            </div>
        </div>
         <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Client le plus récurrent</h5>
                <p class="card-text"><?php
                    $res = $bdd->query("SELECT id_user as nb FROM commande GROUP BY id_user ORDER BY COUNT(*) DESC LIMIT 1");
                    $data = $res->fetch();
                    $nb = $data['nb'];
                    $sql = $bdd->prepare("SELECT *  FROM utilisateur WHERE id_user=$nb");
                    $sql->execute();
                    $c = $sql->fetch(PDO::FETCH_ASSOC);
                    ?> <?= $c['nom']  ?></p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Nombre de produits disponibles</h5>
                <p class="card-text"> <?php
                    $res = $bdd->query("SELECT count(*) as nb FROM produit");
                    $data = $res->fetch();
                    $nb = $data['nb'];
                    ?> <?= $nb ?></p>
            </div>
            </div>
        </div>
         <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Commandes en cours de traitement</h5>
                <p class="card-text"> <?php
                    $res = $bdd->query("SELECT count(*) as nb FROM commande WHERE etat_commande=0");
                    $data = $res->fetch();
                    $nb = $data['nb'];
                    ?> <?= $nb ?></p>
            </div>
            </div>  
        </div>
        </div> 
        </div>
        <br/>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Panier moyen commandé</h5>
                <p class="card-text"> <?php
                    $res = $bdd->query("SELECT AVG(montant) as nb FROM commande");
                    $data = $res->fetch();
                    $nb = $data['nb'];
                    ?> <?= number_format($nb, 2, ',', ' '); ?> €</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Article le plus commandé</h5>
                <p class="card-text"> <?php
                    $res = $bdd->query("SELECT id_produit as nb FROM detail_commande GROUP BY id_produit ORDER BY COUNT(*) DESC LIMIT 1");
                    $data = $res->fetch();
                    $nb = $data['nb'];
                    $sql = $bdd->prepare("SELECT * FROM produit WHERE id_produit=$nb");
                    $sql->execute();
                    $c = $sql->fetch(PDO::FETCH_ASSOC);
                    ?> <?= $c['titre'] ?></p>
            </div>
            </div>
        </div>        
        </div>
        </div>
    </section>    

<?php
  }
   else{
       echo "vous n'avez pas accès à cette page";
   } 
    include_once 'footer.php';
?>