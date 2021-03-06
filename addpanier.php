<?php
    include_once 'header.php';
    require 'includes/db.inc.php';

    if(isset($_GET['id'])){
		$id = $_GET['id'];
	    $requser = $bdd->prepare("SELECT * FROM produit WHERE id_produit = $id");
	    $requser->execute(array($id));
	    $produit = $requser->fetch();
    	if(isset($_SESSION['npanier'])){
    		$id_array = array_column($_SESSION['npanier'],"id_produit");
    		if(!in_array($_GET['id'],$id_array)){
    			$item_array = array(
    				'id_produit' => $produit['id_produit'],
    				'item_name' => $produit["titre"],
    				'prix' => $produit["prix"],
    				'stock' => $produit["stock"],
    				'quantité' => 1,
    			);
    			$count = count($_SESSION["npanier"]);
  			$_SESSION["npanier"][$count+1] = $item_array;
    		}
    	}else{
    		$item_array = array(
    			'id_produit' => $produit['id_produit'],
    			'item_name' => $produit["titre"],
    			'prix' => $produit["prix"],
    			'stock' => $produit["stock"],
    			'quantité' => 1,
    		);
    		$_SESSION["npanier"][0] = $item_array;
    	}
    }

    if(isset($_GET["action"])){
    	if($_GET["action"]=="delete"){
    		foreach($_SESSION["npanier"] as $key => $value){
    			if($value["id_produit"] == $produit["id_produit"]){
    				unset($_SESSION["npanier"][$key]);
    			}
    		}
    	}
    }

    //print_r($_SESSION["npanier"]);
    
?>
<section>
	<div class="container">
	<h2 class = 'panier-title'>Votre panier</h2>
	<?php
	    if(!empty($_SESSION['npanier'])) { ?>
	    	<form action = "order.php" method = "POST">
	    	<table class="table">
		        <thead>
		            <tr>
		            <th scope="col">#</th>
		            <th scope="col">Produit</th>
		            <th scope="col">Quantité</th>
		            <th scope="col">Prix</th>
		            <th scope="col">Total</th>
		            <th scope="col">Action</th>
		            </tr>
		        </thead>
		        <?php 
		        	//$panier  = $bdd->query('SELECT * FROM produit ORDER BY id_produit ASC')
		        	$total = 0;
		        	$i=1;
		        	foreach($_SESSION['npanier'] as $p) :
		        ?>
				<tbody>
		            <tr>
		            <th scope="row"><?php echo $i++?></th>
		            <td><?php echo $p['item_name'];?></td>
		            <td><input type="number" min="1" max="<?php $p['stock'] ?>" name="quantité" value = "1"></td>
		            <td><?php echo $p['prix'];?></td>
		            <td><?php echo number_format($p['prix']/* *$p['quantité']*/,2);?></td>
		            <td>  
		                <a href="addpanier.php?action=delete&id=<?php echo $p['id_produit'];?>" class="btn btn-danger">Supprimer</a></td>
		            </tr>
		            <?php $total = $total + ($p['prix']/* *$p['quantité']*/); ?>
		            <?php endforeach ?>
		            <tr>
		            	<td colspan = "4" align="right">Total</td>
		            	<th> <?php echo number_format($total,2); ?> </th>
		            </tr>
		        </tbody>  
	    	</table>
			 <?php  if(isset($_SESSION["id_user"])) {?>
			<div class="form-btn">
            	<input type="submit" name="forminscription" value="Commander" />
           	</div>
			<?php  } else{ ?>
			<p class='alert alert-info'>Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de pouvoir payer </p>
			<?php } ?>
	    </form>
	    <?php
	    }else{
	        echo "<p class='no-result'>vous n'avez rien dans le panier !</p>
			<a class='btn btn-info' href='./categorie.php' role='button'> Découvrez notre menu !</a>";
	    }
	?>
	</div>
</section>


<?php
    include_once 'footer.php';
?>