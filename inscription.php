<?php
    include_once 'header.php';
?>
        <section class="bg-form">
            <div class="title-form">
                <h2>Créer votre compte</h2>
            </div>
            <div class="container-form">
                <form name="inscription" action="includes/inscription.inc.php" method="POST">
                    <div class="form-input">
                        <input type="text" class="form-control" name="nom" placeholder="Votre nom" />
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" />
                    </div>
                    <div class="form-input">
                        <input type="email" class="form-control" name="mail" placeholder="Votre e-mail" />
                    </div>
                    <div class="form-input">
                        <input type="email" class="form-control" placeholder="Confirmez votre mail" id="mail2" name="mail2" />
                    </div>
                    <div class="form-input">
                        <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe" />
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
                        <input type="submit" name="forminscription" value="Valider" />
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
                        echo "<p class='erreur-message'>Vous êtes inscrits !</p>";
                    }   
                }
                ?>
            </div>
           
        </section>
<?php
    include_once 'footer.php';
?>