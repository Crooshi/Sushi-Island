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
    $requser = $bdd->prepare("SELECT * FROM produit WHERE id_produit = $id");
    $requser->execute(array($id));
    $produit = $requser->fetch();
    $current_image = $produit['photo'];
    $current_categorie = $produit['id_categorie'];
    if(isset($_POST['newtitre']) AND !empty($_POST['newtitre']) AND $_POST['newtitre'] != $produit['titre']) {
        $newtitre = htmlspecialchars($_POST['newtitre']);
        $inserttitre = $bdd->prepare("UPDATE produit SET titre = ? WHERE id_produit = ?");
        $inserttitre ->execute(array($newtitre, $id));
        header('Location: manage-produit.php');
    }
    
    if(isset($_POST['newdescription']) AND !empty($_POST['newdescription']) AND $_POST['newdescription'] != $produit['description']) {
        $newdescription = htmlspecialchars($_POST['newdescription']);
        $insertdescription = $bdd->prepare("UPDATE produit SET description = ? WHERE id_produit = ?");
        $insertdescription->execute(array($newdescription, $id));
       header('Location: manage-produit.php');
    }
    if(isset($_POST['newprix']) AND !empty($_POST['newprix']) AND $_POST['newprix'] != $produit['prix']) {
        $newprix = htmlspecialchars($_POST['newprix']);
        $insertprix = $bdd->prepare("UPDATE produit SET prix = ? WHERE id_produit = ?");
        $insertprix->execute(array($newprix, $id));
       header('Location: manage-produit.php');
    }
    if(isset($_POST['newstock']) AND !empty($_POST['newstock']) AND $_POST['newstock'] != $produit['stock']) {
        $newstock = htmlspecialchars($_POST['newstock']);
        $insertstock = $bdd->prepare("UPDATE produit SET stock = ? WHERE id_produit = ?");
        $insertstock->execute(array($newstock, $id));
       header('Location: manage-produit.php');
    }
    if(isset($_POST['newcategorie']) AND !empty($_POST['newcategorie']) AND $_POST['newcategorie'] != $current_categorie) {
        $newcategorie = htmlspecialchars($_POST['newcategorie']);
        $insertcategorie = $bdd->prepare("UPDATE produit SET id_categorie = ? WHERE id_produit = ?");
        $insertcategorie ->execute(array($newcategorie, $id));
       header('Location: manage-produit.php');
    }
    
    if(isset($_POST['newtitre']) AND $_POST['newtitre']== $produit['titre']){
       header('Location: manage-produit.php');
    }
    
?>
   <h2 class="admin-title">Modifier un produit</h2>
   <div class="add-produit">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control" name="newtitre" value="<?= $produit['titre']?>" />
                </div>
                 <div class="mb-3">
                    <textarea class="add-produit-text" name="newdescription"><?= $produit['description']?></textarea>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" name="newprix" value="<?= $produit['prix']?>" />
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" name="newstock" value="<?= $produit['stock']?>" />
                </div>
                <div class="mb-3">
                    <p> <?php if ($produit['photo']== ""){
                    echo "Pas d'image ajouté";
                    }
                    else{
                ?>
                    <img src="img/<?= $produit['photo']?>" alt="..." width="100px">                      
                    <?php    
                    }

            ?>      </p>
                </div>
                <div class="mb-3">
                    <select name="newcategorie">
                        <?php 
                        $categorie  = $bdd->query("SELECT * FROM categorie WHERE active='Oui'");
                        foreach($categorie as $c) :    ?>        
                        <option value="<?= $c['id_categorie']?>"><?= $c['libelle']?></option>
                        <?php endforeach ?>
                    </select>    
                </div>
                <div class="mb-3 add-produit-btn">
                    <input class="btn btn-secondary btn-lg" type="submit" name="formcategorie" value="Mis à jour du produit !" />
                </div>                
            </form>
            </div>
</div>
<?php   
}
else {
   header("Location: manage-produit.php");
}
?>

<?php
    }
   else{
       echo "vous n'avez pas accès à cette page";
   } 
    include_once 'footer.php';
?>