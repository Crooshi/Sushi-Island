<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
    if(isset($_SESSION["id_user"]) AND $_SESSION['statut']==1){
 ?>
<?php include_once 'header-admin.php'; ?>

<div class="container">
<?php
    $id = $_GET['id'];
    if(isset($id)) {
    $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE id_user = $id");
    $requser->execute(array($id));
    $user = $requser->fetch();
    if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnom = $bdd->prepare("UPDATE utilisateur SET nom = ? WHERE id_user = ?");
        $insertnom ->execute(array($newnom, $id));
        header('Location: manage-admin.php?id='.$id);
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE utilisateur SET mail = ? WHERE id_user = ?");
        $insertmail->execute(array($newmail, $id));
        header('Location: manage-admin.php?id='.$id);
    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);
        if($mdp1 == $mdp2) {
            $insertmdp = $bdd->prepare("UPDATE utilisateur SET mdp = ? WHERE id_user = ?");
            $insertmdp->execute(array($mdp1, $id));
        header('Location: manage-admin.php?id='.$id);
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
    if(isset($_POST['newnom']) AND $_POST['newnom']== $user['nom']){
        header('Location: manage-admin.php?id='.$id);
    }
    
?>
   <h2 class="admin-title">Modifier un Admin</h2>
            <form action="" method="POST">
                <div class="form-input">
                    <label>Nom :</label>
                    <input type="text" class="form-control" name="newnom" placeholder="Nom" value="<?= $user['nom']?>" />
                </div>
                <div class="form-input">
                    <label>E-mail :</label>
                    <input type="email" class="form-control" name="newmail" placeholder="E-mail" value="<?= $user['mail']?>" />
                </div>
                <div class="form-input">
                    <input type="password" class="form-control" name="newmdp1" placeholder="Mot de passe" />
                </div>
                <div class="form-input">
                    <input type="password" class="form-control"  name="newmdp2" placeholder="Confirmez votre mdp"   />
                </div>
                <div class="form-btn">
                    <input type="submit" name="formadmin" value="Mis à jour du profil !" />
                </div>                
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
</div>
<?php   
}
else {
    header('Location: manage-admin.php');
}
?>

<?php
  }
   else{
       echo "vous n'avez pas accès à cette page";
   } 
    include_once 'footer.php';
?>