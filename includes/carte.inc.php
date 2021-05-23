<?php

    require 'db.inc.php';
    function query($req){
        $stmt = $bdd->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    


    


?>