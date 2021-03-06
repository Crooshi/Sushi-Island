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
    if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse']) {
        $newadresse = htmlspecialchars($_POST['newadresse']);
        $insertadresse = $bdd->prepare("UPDATE utilisateur SET adresse = ? WHERE id_user = ?");
        $insertadresse ->execute(array($newadresse, $id));
        header('Location: profil.php?id='.$id);
    }   
    if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['ville']) {
        $newville = htmlspecialchars($_POST['newville']);
        $insertville = $bdd->prepare("UPDATE utilisateur SET ville = ? WHERE id_user = ?");
        $insertville ->execute(array($newville, $id));
        header('Location: profil.php?id='.$id);
    }    
    if(isset($_POST['newcp']) AND !empty($_POST['newcp']) AND $_POST['newcp'] != $user['code_postal']) {
        $newcp = htmlspecialchars($_POST['newcp']);
        $insertcp = $bdd->prepare("UPDATE utilisateur SET code_postal = ? WHERE id_user = ?");
        $insertcp ->execute(array($newcp, $id));
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
                <div class="form-input">
                    <input type="text" class="form-control" name="newadresse" placeholder="Adresse" value="<?= $user['adresse']?>" />
                </div>
                <div class="form-input">
                    <input type="text" class="form-control" name="newville" placeholder="Ville" value="<?= $user['ville']?>" />
                </div>
                <div class="form-input">
                    <input type="text" class="form-control" name="newcp" placeholder="Code Postal" value="<?= $user['code_postal']?>" />
                </div>
                <div class="form-btn">
                    <input type="submit" name="formuser" value="Mis ?? jour du profil !" />
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