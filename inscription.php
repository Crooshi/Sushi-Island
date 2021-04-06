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
                        <input type="text" class="form-control" name="nom" placeholder="Votre nom" required/>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" required/>
                    </div>
                    <div class="form-input">
                        <input type="email" class="form-control" name="email" placeholder="Votre e-mail" required/>
                    </div>
                    <div class="form-input">
                        <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe" required/>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" name="adresse" placeholder="Votre adresse" required/>
                    </div>
                   <div class="form-input">
                        <input type="text" class="form-control" name="ville" placeholder="Ville" required/>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" name="code_postal" placeholder="Code Postal" required/>
                    </div>
                    <div class="form-btn">
                        <button type="submit" name="submit">Valider</button>
                    </div>
                </form>
                 <?php
                if(isset($_GET["error"])){
                    if ($_GET["error"] == "stmtfailed"){
                        echo "<p> Il y a quelque chose qui ne va pas, réessayer ! </p>";
                    }
                    else if ($_GET["error"] == "none"){
                        echo "<h1> Vous êtes inscrit ! </h1>";
                    }
                    else if ($_GET["error"] == "userexist"){
                        echo "<h1> Compte client déjà existant ! </h1>";
                    }
                } 
            ?>
            </div>
           
        </section>
<?php
    include_once 'footer.php';
?>