<?php

    require_once('../models/db.php');

    if(isset($_GET['id'])){
        $idj = $_GET['id'];

        $selectjourney = $conn->query("SELECT * FROM entrer_sortie WHERE id=$idj");
        $journey = $selectjourney->fetch();
    }

    if(isset($_POST['submit'])){
        if(!empty($_POST['num-doc']) && !empty($_POST['entrer-sortie']) && !empty($_POST['lieu-dest'])  && !empty($_POST['motif'])){
                    
            $num_doc = htmlspecialchars($_POST['num-doc']);
            $entrer_sortie = htmlspecialchars($_POST['entrer-sortie']);
            $lieu_dest = htmlspecialchars($_POST['lieu-dest']);
            $motif = htmlspecialchars($_POST['motif']);

            $update = $conn->prepare("UPDATE entrer_sortie SET num_document=?, enter_sortie=?, lieu_dest=?, motif=? WHERE id=?");
            $update->execute([$num_doc, $entrer_sortie, $lieu_dest, $motif,$idj]);
                                
            if($update->rowCount() > 0){
                $action = 'modification';
                $notification = "Un voyage $entrer_sortie a été modifier avec le numero : $num_doc";
                $insertNotif = $conn->prepare("INSERT INTO notifications(num_document,message, actions) VALUES(?,?,?)");
                $insertNotif->execute([$num_doc,$notification,$action]);
            }

            header('location: ./repertoireJourney.php');

        }else{
            $msgError[] = "Veiller renseigner tous les champs !";
        }
    }