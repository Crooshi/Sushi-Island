<?php
    include_once 'header.php';
    require 'includes/db.inc.php';   
?>
     <?php include_once 'header-admin.php'; ?>
     <?php
     if(isset($_SESSION['upload'])){
         echo $_SESSION['upload'];
         unset($_SESSION['upload']);
     }
     ?>
    <div class="container">
            <h2 class="admin-title">Ajouter un Produit</h2>
            <form action="" method="POST" enctype="multipart/form-data">        
                <div class="form-input">
                    <input type="text" class="form-control" name="titre" placeholder="Entrez le nom du nouveau produit" />
                </div>
                <div class="form-input">
                    <textarea class="" name="description" placeholder="Entrez une description "></textarea>
                </div>
                <div class="form-input">
                    <input type="number" class="form-control" name="prix" placeholder="Entrez le prix du nouveau produit" />
                </div>
                <div class="form-input">
                    <input type="number" class="form-control" name="stock" placeholder="Entrez le stock du nouveau produit" />
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Selectionner une photo</label>
                    <input type="file" class="form-control" name="photo" id="inputGroupFile01">
                </div>
                <div class="">
                    <select name="categorie">
                        <?php 
                        $categorie  = $bdd->query("SELECT * FROM categorie WHERE active='Oui'");
                        foreach($categorie as $c) :    ?>        
                        <option value="<?= $c['id_categorie']?>"><?= $c['libelle']?></option>
                        <?php endforeach ?>
                    </select>    
                </div>
                <div class="form-btn">
                    <input class="btn btn-secondary btn-lg" type="submit" name="formproduit" value="Ajouter un nouveau produit" />
                </div>                
            </form>
            <?php
                 if(isset($_POST['formproduit'])){
                    $titre = htmlspecialchars($_POST['titre']);
                    $description = htmlspecialchars($_POST['description']);
                    $prix = htmlspecialchars($_POST['prix']);
                    $stock = htmlspecialchars($_POST['stock']);
                    $categorie = htmlspecialchars($_POST['categorie']);
                   
                    if(isset($_FILES['photo']['name'])){
                        $image_name = $_FILES['photo']['name'];
                        $source = $_FILES['photo']['tmp_name'];
                        $destination = "img/". $image_name;

                        $upload = move_uploaded_file($source, $destination);
                        if($upload==false){
                            $_SESSION['upload'] = "<div> Erreur pour upload l'image. </div>";
                            header("Location: ./add-produit.php");
                            die();
                        }
                    }
                    else{
                        $image_name= "";
                    }
                    $insertmbr = $bdd->prepare("INSERT INTO produit(id_categorie, titre, description, prix, stock, photo) VALUES(?, ?, ?, ?, ?, ?)");
                    $insertmbr->execute(array($categorie, $titre, $description, $prix, $stock, $image_name));
                    $erreur ="Produit ajouté avec succes !";
                    
                    


                 }   

            ?>
            <?php
            if(isset($erreur)) {
                echo '<font color="green">'.$erreur."</font>";
            }
            ?>

    </div>        


<?php
    include_once 'footer.php';
?>

