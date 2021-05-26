<?php
    include_once 'header.php';
    require 'includes/db.inc.php';

    //$id = $_GET['id'];
?>
<?php
	if(!empty($_SESSION['npanier'])){
		$prix=0;
		$user = $_SESSION['id_user'];
		$mail = $_SESSION['mail'];
		$nom = $_SESSION['nom'];
		//$adr = $_SESSION['adresse'];
		$date = htmlspecialchars(date('d-m-Y'));
	    if(isset($_SESSION['npanier'])){
	    	foreach($_SESSION['npanier'] as $p){
	    		$newid = htmlspecialchars($p["id_produit"]);
	    		$nom = htmlspecialchars($p["item_name"]);
	    		$qte = ($p["quantité"]);
	    		$prix += ($p["prix"]);

	    		//$orderId = htmlspecialchars($_GET['commande']);
	    		
	    		
	    	}
	    	$insert = $bdd->query("INSERT INTO commande(id_user,montant,date_commande,etat_commande,nom_commande,mail_commande,adr_commande) 
	    		VALUES('$user','$prix','$date','0','$nom','mail','text')
	    	");
	    	//adr_commande = '$adr'

	    	//$res = mysqli_query($conn, $insert);
	    	if($insert==true){
	    		//succès
	    		echo "<p>Votre commande a été enregistré</p>";
	    		unset($_SESSION['npanier']);
	    		return true;
	    	}else{
	    		echo"<p>erreur dans la commande</p>";
	    	}
	    }
	    //header("Location: order.php");
    }else{
        die("vous n'avez rien dans le panier");
    }
?>


<?php
    include_once 'footer.php';
?>