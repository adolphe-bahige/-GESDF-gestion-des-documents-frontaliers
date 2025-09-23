<?php

    require_once('../models/db.php');

    if(isset($_GET['id'])){
        $idDoc = $_GET['id'];

        $selectdoc = $conn->query("SELECT * FROM documents WHERE id=$idDoc");
        $document = $selectdoc->fetch();
    }

    if(isset($_POST['submit'])){
        if(!empty(!empty($_POST['num-doc']) && !empty($_POST['name']) && !empty($_POST['nationalite']) && !empty($_POST['profession']) && !empty($_POST['type-document'])  && !empty($_POST['validite']) && !empty($_POST['invalidite']) && !empty($_FILES['photo']))){
                    
            $numdoc = htmlspecialchars($_POST['num-doc']);
            $name = htmlspecialchars(ucfirst(strtolower($_POST['name'])));
            $nationalite = htmlspecialchars($_POST['nationalite']);
            $profession = htmlspecialchars($_POST['profession']);
            $typedocument = htmlspecialchars($_POST['type-document']);
            $validite = htmlspecialchars($_POST['validite']);
            $invalidite = htmlspecialchars($_POST['invalidite']);

            $namephoto = $_FILES["photo"]['name'];
            $photo_tmp_name = $_FILES['photo']['tmp_name'];
            move_uploaded_file($photo_tmp_name,"../imageUser/$namephoto");


            $update = $conn->prepare("UPDATE documents SET num_document=?, name=?, nationality=?, profession=?, type_document=?, validity=?, invalidity=?, photo=? WHERE id=?");
            $update->execute([$numdoc, $name, $nationalite, $profession, $typedocument, $validite, $invalidite, $namephoto,$idDoc]);
                                
            header('location: ./repertoireUser.php');

        }else{
            $msgError= "Veiller renseigner tous les champs !";
        }
    }