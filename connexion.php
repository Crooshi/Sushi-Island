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
                    <input type="email" class="form-control" name="mail" placeholder="Votre e-mail" required />
                </div>
                <p>Mot de passe</p>
                <div class="form-input">
                    <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe" required/>
                </div>
                <div class="form-btn">
                    <input type="submit" name="formconnexion" value="Se connecter" />
                </div>
                <div>
                <?php
                if(isset($_GET["erreur"])){
                    if($_GET["erreur"] == "wrongconnect"){
                        echo "<div class='alert alert-danger'> Mauvais mail ou mot de passe !</div> ";
                    }
                    else if($_GET["erreur"] == "champsmanquant"){
                        echo "<div lass='alert alert-danger'>Tous les champs doivent être complétés !</div>";
                    }  
                }
                ?>
                </div>
    
               <br><hr style="height:1px; width:80%; margin: auto; color: black;"><br>
                <h3>Nouveau client ?</h3>
                <div class="form-btn">
                    <input type="button" value="Créer un compte" onclick="window.location='./inscription.php';"/>
                </div>
            </form>
        </div>
        
    </section>

<?php 
    include_once 'footer.php';
?>  