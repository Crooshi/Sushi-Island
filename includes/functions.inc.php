<?php

    function userExists($conn, $email){
        $sql ="SELECT * FROM utilisateur WHERE email = ?"; 
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../inscription.php?error=stmtfailed" );
            exit();
        }

        mysqli_stmt_bind_param($stmt,"s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result =false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    } 

    function createUser($conn, $nom, $prenom, $email, $mdp, $adresse, $ville, $cp){
        $sql ="INSERT INTO utilisateur (nom, prenom, email, mdp, adresse, ville, code_postal) VALUES('$nom', '$prenom', '$email', '$mdp', '$adresse', '$ville', '$cp')";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../inscription.php?error=stmtfailed" );
            exit();
        }

        $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssssss", $nom, $prenom, $email, $hashMdp, $adresse, $ville, $cp);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../inscription.php?error=none" );
        exit();
   }

   function loginUser($conn, $email, $mdp){
       $userExists = userExists($conn, $email);

       if($userExists === false){
           header("location: ../connexion.php?error=erreurconnexion");
            exit();
       }

       $mdpHash = $userExists['mdp'];
       $checkMdp = password_verify($mdp, $mdpHash);

       if (password_verify($mdp, $mdpHash) === false){
           header("location: ../connexion.php?error=mauvaismdp");
            exit();
       }
       else if($checkMdp === true){
            session_start();
            $_SESSION["email"] = $userExists["email"];
            header("location: ../accueil.php");
            exit();
       }
   }