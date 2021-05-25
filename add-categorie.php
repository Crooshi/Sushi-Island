<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
     <?php include_once 'header-admin.php'; ?>
    <div class="container">
            <h2 class="admin-title">Ajouter une Catégorie</h2>
            <form action="" method="POST">        
                <div class="form-input">
                    <input type="text" class="form-control" name="libelle" placeholder="Entrez le nom de la nouvelle catégorie" />
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" value="Oui">Oui
                </div>
                 <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" value="Non">Non
                </div>
                <div class="form-btn">
                    <input class="btn btn-secondary btn-lg" type="submit" name="formcategorie" value="Ajouter une nouvelle catégorie" />
                </div>                
            </form>
            <?php
                if(isset($_POST['formcategorie'])){
                   $libelle = htmlspecialchars($_POST['libelle']);
                   if(isset($_POST['active'])){
                       $active = $_POST['active'];

                   } 
                   else{
                       $active = "Non";
                   }
                   $insertmbr = $bdd->prepare("INSERT INTO categorie(libelle, active) VALUES(?, ?)");
                    $insertmbr->execute(array($libelle, $active));
                    $erreur = " Catégorie ajoutée !";
                }
            ?>
           <?php
            if(isset($erreur)) {
                echo '<font color="red">'.$erreur."</font>";
            }
            ?>
    </div>        

<?php
  }
   else{
       echo "vous n'avez pas accès à cette page";
   } 
    include_once 'footer.php';
?>