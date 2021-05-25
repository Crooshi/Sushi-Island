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
        <div class="card col-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        </div>
        <div class="card  col-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        </div>
        <div class="card  col-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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