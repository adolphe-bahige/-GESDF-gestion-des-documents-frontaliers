<?php
   require_once('../models/db.php');

    $readjourney = $conn->query("SELECT * FROM entrer_sortie ORDER BY created_at ASC");
    $journeys = $readjourney->fetchAll(PDO::FETCH_ASSOC);
    $rowjourney = $readjourney->rowCount();
    if($rowjourney <= 0){
        $msgjourneyVide = "Aucun voyage enregistrer.";
    }