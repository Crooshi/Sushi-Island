<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
<?php include_once 'header-admin.php'; ?>
<div class="container">
<?php
    $id = $_GET['id'];
    if(isset($id)) {
    $requser = $bdd->prepare("SELECT * FROM categorie WHERE id_categorie = $id");
    $requser->execute(array($id));
    $categorie = $requser->fetch();
    if(isset($_POST['newlibelle']) AND !empty($_POST['newlibelle']) AND $_POST['newlibelle'] != $categorie['libelle']) {
        $newlibelle = htmlspecialchars($_POST['newlibelle']);
        $insertnom = $bdd->prepare("UPDATE categorie SET libelle = ? WHERE id_categorie = ?");
        $insertnom ->execute(array($newnom, $id));
        header('location:./manage-categorie.php');
    }
    if(isset($_POST['newactive']) AND !empty($_POST['newactive']) AND $_POST['newactive'] != $categorie['active']) {
        $newactive = htmlspecialchars($_POST['newactive']);
        $insertactive = $bdd->prepare("UPDATE categorie SET active = ? WHERE id_categorie = ?");
        $insertactive->execute(array($newactive, $id));
        header('location:./manage-categorie.php');
    }
    if(isset($_POST['newlibelle']) AND $_POST['newlibelle']== $categorie['libelle']){
        header('location:./manage-categorie.php');
    }
    
?>
   <h2 class="admin-title">Modifier une Catégorie</h2>
            <form action="" method="POST">
                <div class="form-input">
                    <input type="text" class="form-control" name="newlibelle" placeholder="Entrez le nouveau nom de la  catégorie" />
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="newactive" value="Oui">Oui
                </div>
                 <div class="form-check">
                    <input class="form-check-input" type="radio" name="newactive" value="Non">Non
                </div>
                <div class="form-btn">
                    <input class="btn btn-secondary btn-lg" type="submit" name="formcategorie" value="Mis à jour de la catégorie !" />
                </div>                
            </form>
</div>
<?php   
}
else {
   header('location:./manage-categorie.php');
}
?>
<?php
  }
   else{
       echo "vous n'avez pas accès à cette page";
   } 
    include_once 'footer.php';
?>