<?php
session_start();
   
    require 'db.inc.php';

    if(isset($_POST['formconnexion'])) {
        $mailconnect = htmlspecialchars($_POST['mail']);
        $mdpconnect = sha1($_POST['mdp']);
        if(!empty($mailconnect) AND !empty($mdpconnect)) {
            $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ? AND mdp = ?");
            $requser->execute(array($mailconnect, $mdpconnect));
            $userexist = $requser->rowCount();
             if($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id_user'] = $userinfo['id_user'];
                $_SESSION['nom'] = $userinfo['nom'];
                $_SESSION['prenom'] = $userinfo['prenom'];
                $_SESSION['statut'] = $userinfo['statut'];
                $_SESSION['adresse'] = $userinfo['adresse'];
                $_SESSION['mail'] = $userinfo['mail'];
                
                if($userinfo['statut'] == 0){
                    header("Location: ../index.php?id=".$_SESSION['id_user']);
                }
                else if($userinfo['statut'] == 1){
                    header("Location: ../admin.php?id=".$_SESSION['id_user']);
                }
            } else {
               header("Location: ../connexion.php?erreur=wrongconnect");
                exit(); 
            }
        } else {
            header("Location: ../connexion.php?erreur=champsmanquant");
            exit(); 
           
        }
    }
    
        



          
       /*  $email= $_POST["email"];
        $mdp= $_POST["mdp"];


        require_once 'db.inc.php';
        require_once 'functions.inc.php';


        loginUser($conn, $email, $mdp);

    
    else{
        header("location: ../connexion.php");
        exit();
    } */