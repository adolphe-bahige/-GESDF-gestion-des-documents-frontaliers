<?php
    require_once('../models/db.php');

    if(isset($_GET['id'])){
        $idDoc = $_GET['id'];

        $selectdoc = $conn->query("SELECT * FROM documents WHERE id=$idDoc");
        $document = $selectdoc->fetch();
        
        $selectjourney = $conn->query("SELECT * FROM entrer_sortie WHERE id=$idDoc");
        $journey = $selectjourney->fetch();

    }else{
        header('location: ./repertoireUser.php');
    }