<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
    <section>
       <?php include_once 'header-admin.php'; ?>
   <div class="container">
       <!-- Admin -->
        <h2 class="admin-title">Gestions des Admins</h2>
        <?php
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
        <a href="./add-admin.php" class="btn btn-outline-dark">Ajouter un admin</a>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">E-mail</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <?php
            $admin  = $bdd->query('SELECT * FROM utilisateur WHERE statut=1');
            $i=1;
            foreach($admin as $a) :
        ?>
        <tbody>
            <tr>
            <th scope="row"><?= $i++?></th>
            <td><?= $a['nom']?></td>
            <td><?= $a['mail']?></td>
            <td>  
                <a href="./update-admin.php?id=<?= $a['id_user']?>" class="btn btn-secondary">Modifier</a>
                <a href="./delete-admin.php?id=<?= $a['id_user']?>" class="btn btn-danger">Supprimer</a></td>
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