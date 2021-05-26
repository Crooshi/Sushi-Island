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
                <h5 class="card-title">Ventes Total</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Produit le plus vendu</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
        </div>
         <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Clients récurrents</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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