<?php
    include_once 'header.php';
    require 'includes/db.inc.php';   
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
                        echo "<p class='erreur-message'> Votre adresse mail n'est pas valide !</p> ";
                    }
                    else if($_GET["erreur"] == "userExist"){
                        echo "<p class='erreur-message'>Adresse mail déjà utilisée !</p>";
                    }   
                    else if($_GET["erreur"] == "mdperreur"){
                        echo "<p class='erreur-message'>Vos mots de passes ne correspondent pas !</p>";
                    }
                    else if($_GET["erreur"] == "mailerreur"){
                        echo "<p class='erreur-message'>Vos adresses mail ne correspondent pas !</p>";
                    }
                    else if($_GET["erreur"] == "champsmanquant"){
                        echo "<p class='erreur-message'>Tous les champs doivent être complétés !</p>";
                    }  
                    else if($_GET["erreur"] == "none"){
                        echo "<p class='erreur-message'> Admin crée !</p>";
                    }   
                }
                ?>
    </div>        


<?php
    include_once 'footer.php';
?>

