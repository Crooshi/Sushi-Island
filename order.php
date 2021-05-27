<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
?>
<div class="container">
<?php
	if(!empty($_SESSION['npanier'])){
		$prix=0;
		$user = $_SESSION['id_user'];
		$mail = $_SESSION['mail'];
		$nom = $_SESSION['nom'];
		$adr = $_SESSION['adresse'];
		$date = htmlspecialchars(date('Y-m-d H:i:s'));
	    if(isset($_SESSION['npanier'])){
	    	foreach($_SESSION['npanier'] as $p){
	    		$newid = htmlspecialchars($p["id_produit"]);
	    		$qte = ($p["quantité"]);
	    		$prix += ($p["prix"]);
	    	}
			$insert = $bdd->prepare("INSERT INTO commande(id_user,montant,date_commande,etat_commande,nom_commande,mail_commande,adr_commande)
	    		VALUES('$user','$prix','$date','0','$nom','$mail','$adr')");
            $insert->execute(array($user, $prix, $date, '0', $nom, $mail, $adr));	
			$id_commande = $bdd->lastInsertId();
			for($i = 0; $i <count($_SESSION['npanier']); $i++)
        	{
			$insert2 = $bdd->prepare("INSERT INTO detail_commande(id_commande,id_produit,quantite)
	    		VALUES('$id_commande','$newid','$qte')");
            $insert2->execute(array($id_commande, $newid, $qte));	
			}
	    	if($insert==true){
	    		//succès

	    		echo "<p class='alert alert-success'>Votre commande n° $id_commande a bien été enregistrée</p>";
	    		unset($_SESSION['npanier']);

	    		return true;
	    	}else{
				print_r($insert);
	    		echo"<p class='alert alert-info'> erreur dans la commande</p>";
	    	}
	    }
	    //header("Location: order.php");
    }else{
        die("<p class='alert alert-info'> Vous n'avez rien dans le panier</p>");
    }
?>

</div>
<?php
    include_once 'footer.php';
?>
