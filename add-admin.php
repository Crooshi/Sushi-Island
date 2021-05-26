<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
     <?php include_once 'header-admin.php'; ?>
    <div class="container">
            <h2 class="admin-title">Ajouter un Admin</h2>
            <form action="includes/add-admin.inc.php" method="POST">
                <div class="form-input">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" />
                </div>
                <div class="form-input">
                    <input type="text" class="form-control" name="prenom" placeholder="Prenom" />
                </div>
                <div class="form-input">
                    <input type="email" class="form-control" name="mail" placeholder="E-mail" />
                </div>
                <div class="form-input">
                    <input type="email" class="form-control" placeholder="Confirmez votre mail" id="mail2" name="mail2" />
                </div>
                <div class="form-input">
                    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" />
                </div>
                <div class="form-input">
                    <input type="password" class="form-control"  placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                </div>
                <div class="form-input">
                    <input type="text" class="form-control" name="adresse" placeholder="Votre adresse" />
                </div>
                <div class="form-input">
                    <input type="text" class="form-control" name="ville" placeholder="Ville" />
                </div>
                <div class="form-input">
                    <input type="text" class="form-control" name="code_postal" placeholder="Code Postal" />
                </div>
                <div class="form-btn">
                    <input type="submit" name="formadmin" value="Valider" />
                </div>                
            </form>
            <?php
                if(isset($_GET["erreur"])){
                    if($_GET["erreur"] == "adresseinvalide"){
                        echo "<div class='alert alert-danger'> Votre adresse mail n'est pas valide !</div> ";
                    }
                    else if($_GET["erreur"] == "userExist"){
                        echo "<div class='alert alert-danger'>Adresse mail déjà utilisée !</div>";
                    }   
                    else if($_GET["erreur"] == "mdperreur"){
                        echo "<div class='alert alert-danger'>Vos mots de passes ne correspondent pas !</div>";
                    }
                    else if($_GET["erreur"] == "mailerreur"){
                        echo "<div class='alert alert-danger'>Vos adresses mail ne correspondent pas !</div>";
                    }
                    else if($_GET["erreur"] == "champsmanquant"){
                        echo "<div class='alert alert-danger'>Tous les champs doivent être complétés !</div>";
                    }  
                    else if($_GET["erreur"] == "none"){
                        echo "<div class='alert alert-success'> L'Admin a bien été crée !</div>";
                    }   
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

