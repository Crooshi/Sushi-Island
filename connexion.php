<?php 
    include_once 'header.php';
?>  
    <section class="connexion">
        <div class="title-form">
            <h2>Identifiez-vous</h2>
        </div>
        <div class="connexion-form">
            <form name="connexion-form" action="includes/connexion.inc.php" method="POST">
                <h3>Déjà client ?</h3>
                <p>Adresse e-mail</p>
                <div class="form-input">
                    <input type="email" class="form-control" name="email" placeholder="Votre e-mail" required />
                </div>
                <p>Mot de passe</p>
                <div class="form-input">
                    <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe" required/>
                </div>
                <div class="form-btn">
                    <button type="submit" name="submit">Valider</button>
                </div>
               <!--  <br><hr style="height:1px; width:80%; margin: auto; color: black;"><br>
                <h3>Nouveau client ?</h3>
                <div class="form-btn">
                    <input type="button" value="Créer un compte" onclick="window.location='./inscription.php';"/>
                </div> -->
            </form>
        </div>
         <?php
                if(isset($_GET["error"])){
                    if ($_GET["error"] == "wronglogin"){
                        echo "<p> Le mot de passe ou l'identifiant est incorect  </p>";
                    }
                } 
            ?>
    </section>

<?php 
    include_once 'footer.php';
?>  