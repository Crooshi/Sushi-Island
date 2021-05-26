<?php
    include_once 'header.php';
    require 'includes/db.inc.php';

    //$id = $_GET['id'];
?>
<?php
	if(!empty($_SESSION['npanier'])){
		$date = date('d-m-Y');
	    if(isset($_SESSION['npanier'])){
	    	foreach($_SESSION['npanier'] as $p){
	    		$newid = htmlspecialchars($p["id_produit"]);
	    		$nom = htmlspecialchars($p["item_name"]);
	    		$prix = htmlspecialchars($p["prix"]);
	    		$qte = htmlspecialchars($p["quantité"]);
	    		$orderDate = htmlspecialchars($date);
	    		//$orderId = htmlspecialchars($_GET['commande']);

	    		$insert = "INSERT INTO commande SET
	    			date_commande = '$orderDate',

	    		";
	    	}
	    	unset($_SESSION['npanier']);
	    }
    }else{
        die("vous n'avez rien dans le panier");
    }
?>


<?php
    include_once 'footer.php';
?>