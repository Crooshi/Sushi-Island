<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Sushi Island</title>
		<!--Lien avec CSS-->
		<link rel="stylesheet" href="./sitestyle.css">
		<!--Librairie d'icones-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
		<!--Feuille de style BOOTSTRAP-->
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	</head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="./index.php">Sushi Island</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse nav-item-right" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./categorie.php">Menu</a>
                </li>
                <?php
                    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==0){
                        $user = $_SESSION['id_user'];
                        echo "<li class='nav-item'> <a class='nav-link' href='./profil.php?id=$user'> Mon Profil</a> </li>";
                        echo "<li class='nav-item'> <a class='nav-link' href='includes/deconnexion.inc.php'>Se déconnecter</a> </li>";
                    }
                    else if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
                        echo "<li class='nav-item'> <a class='nav-link' href='./admin.php'>Gestion admin</a> </li>";
                        echo "<li class='nav-item'> <a class='nav-link' href='includes/deconnexion.inc.php'>Se déconnecter</a> </li>";
                    }
                   
                    else{
                         echo "<li class='nav-item'> <a class='nav-link' href='./connexion.php'>Se connecter</a></li>";
                         echo "<li class='nav-item'> <a class='nav-link' href='./inscription.php'>Créer un compte</a></li>";
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="./addpanier.php">Panier</a>
                </li>
                </ul>
            </div>
        </nav>