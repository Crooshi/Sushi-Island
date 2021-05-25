<?php
    include_once 'header.php';
    require 'includes/db.inc.php';   
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
   /*  if(isset($_FILES['photo']['name'])){
        $image_name = $_FILES['photo']['name'];
        $source = $_FILES['photo']['tmp_name'];
        $destination = "img/". $image_name;

        $upload = move_uploaded_file($source, $destination);
        $insertphoto = $bdd->prepare("UPDATE produit SET photo = $image_name WHERE id_produit = ?");
        $insertphoto ->execute(array($image_name, $id));
        if($upload==false){
            $_SESSION['upload'] = "<div> Erreur pour upload l'image. </div>";                
            header("Location: ./manage-produit.php");
            die();
        }
        if($current_image != ""){
        $path = "img/".$current_image;
        $remove = unlink($path);

        if($remove == false){
            $_SESSION['remove-failed'] ="<div>Erreur lors de la supprision de l'image, veuillez réessayer plutard</div>";
            header('location:./manage-produit.php');
            die();
        } 
        }    
    else{
        $image_name = $current_image;
    }
    } */
    
    if(isset($_POST['newtitre']) AND $_POST['newtitre']== $produit['titre']){
       header('Location: manage-produit.php');
    }
    
?>
   <h2 class="admin-title">Modifier un Admin</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-input">
                    <input type="text" class="form-control" name="newtitre" value="<?= $produit['titre']?>" />
                </div>
                 <div class="form-input">
                    <textarea class="" name="newdescription"><?= $produit['description']?></textarea>
                </div>
                <div class="form-input">
                    <input type="number" class="form-control" name="newprix" value="<?= $produit['prix']?>" />
                </div>
                <div class="form-input">
                    <input type="number" class="form-control" name="newstock" value="<?= $produit['stock']?>" />
                </div>
                <div class="">
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
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Selectionner une nouvelle photo</label>
                    <input type="file" class="form-control" name="newphoto" id="inputGroupFile01">
                </div>
                <div class="">
                    <select name="newcategorie">
                        <?php 
                        $categorie  = $bdd->query("SELECT * FROM categorie WHERE active='Oui'");
                        foreach($categorie as $c) :    ?>        
                        <option value="<?= $c['id_categorie']?>"><?= $c['libelle']?></option>
                        <?php endforeach ?>
                    </select>    
                </div>
                <div class="form-btn">
                    <input class="btn btn-secondary btn-lg" type="submit" name="formcategorie" value="Mis à jour du produit !" />
                </div>                
            </form>
</div>
<?php   
}
else {
   header("Location: manage-produit.php");
}
?>

<?php
    include_once 'footer.php';
?>