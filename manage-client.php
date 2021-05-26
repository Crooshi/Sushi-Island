<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
    <section>
       <?php include_once 'header-admin.php'; ?>
   <div class="container">
       <!-- Client -->
        <h2 class="admin-title">Gestions des Clients</h2>
        <?php
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">E-mail</th>
            <th scope="col">Nombre de commandes</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <?php
            $client  = $bdd->query('SELECT * FROM utilisateur WHERE statut=0');
            $i=1;
            foreach($client as $c) :
        ?>
        <tbody>
            <tr>
            <th scope="row"><?= $i++?></th>
            <td><?= $c['nom']?></td>
            <td><?= $c['prenom']?></td>
            <td><?= $c['mail']?></td>
            <td> # </td>
            <td>  
                <a href="./delete-client.php?id=<?= $c['id_user']?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
        </tbody>   
        <?php
        endforeach;
        ?>
        </table>
    </div>
    </section>
<?php
  }
   else{
       echo "vous n'avez pas accès à cette page";
   } 
    include_once 'footer.php';
?>