<?php
    include_once 'header.php';
    require 'includes/db.inc.php';
 ?>

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
        header('Location: profil.php?id='.$id);
    }
    if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
        $newprenom = htmlspecialchars($_POST['newprenom']);
        $insertprenom = $bdd->prepare("UPDATE utilisateur SET prenom = ? WHERE id_user = ?");
        $insertprenom ->execute(array($newprenom, $id));
        header('Location: profil.php?id='.$id);
    }    
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE utilisateur SET mail = ? WHERE id_user = ?");
        $insertmail->execute(array($newmail, $id));
        header('Location: profil.php?id='.$id);    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);
        if($mdp1 == $mdp2) {
            $insertmdp = $bdd->prepare("UPDATE utilisateur SET mdp = ? WHERE id_user = ?");
            $insertmdp->execute(array($mdp1, $id));
            header('Location: profil.php?id='.$id);        } 
        else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
    if(isset($_POST['newnom']) AND $_POST['newnom']== $user['nom']){
            header('Location: profil.php?id='.$id);    
        }
    
?>
   <h2 class="admin-title">Modifier mon profil</h2>
            <form action="" method="POST">
                <div class="form-input">
                    <input type="text" class="form-control" name="newnom" placeholder="Nom" value="<?= $user['nom']?>" />
                </div>
                <div class="form-input">
                    <input type="text" class="form-control" name="newprenom" placeholder="Prenom" value="<?= $user['prenom']?>" />
                </div>
                <div class="form-input">
                    <input type="email" class="form-control" name="newmail" placeholder="E-mail" value="<?= $user['mail']?>" />
                </div>
                <div class="form-input">
                    <input type="password" class="form-control" name="newmdp1" placeholder="Mot de passe" />
                </div>
                <div class="form-input">
                    <input type="password" class="form-control"  name="newmdp2" placeholder="Confirmez votre mdp"   />
                </div>
                <div class="form-btn">
                    <input type="submit" name="formuser" value="Mis à jour du profil !" />
                </div>                
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
</div>
<?php   
}
else {
    header('Location: profil.php?id='.$id);
}
?>

<?php
    include_once 'footer.php';
?>