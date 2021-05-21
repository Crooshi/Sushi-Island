<?php

$bdd = new PDO('mysql:host=localhost;dbname=site', 'Lea', 'test');

 if(isset($_POST['forminscription']))
 {
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['adresse']) AND !empty($_POST['ville']) AND !empty($_POST['code_postal'])) 
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $ville = htmlspecialchars($_POST['ville']);
        $code_postal = htmlspecialchars($_POST['code_postal']);
       if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) { 
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO utilisateur(nom, prenom, mail, mdp, adresse, ville, code_postal) VALUES(?, ?, ?, ?, ?, ?, ?)");
                      $insertmbr->execute(array($nom, $prenom, $mail, $mdp, $adresse, $ville, $code_postal));
                      echo "Votre compte a bien été créer";
                  } else {
                      header("Location: ../inscription.php?erreur=mdperreur");
                      exit();
                  }
                  }
                   else {
                      header("Location: ../inscription.php?erreur=userExist");
                      exit();        
                  }
                  }     
                  else {
                    header("Location: ../inscription.php?erreur=adresseinvalide");
                    exit();              
                  }
                  } 
                  else {
                  header("Location: ../inscription.php?erreur=mailerreur");
                  exit();  
                }
    }
    else{
      header("Location: ../inscription.php?erreur=champsmanquant");
      exit();  
    }
    
 } 
