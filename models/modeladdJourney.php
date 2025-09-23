<?php
require_once('../models/db.php');

if(isset($_GET['num_doc'])){
    $num_doc = $_GET['num_doc'];

    $selectdoc = $conn->query("SELECT * FROM documents WHERE num_document = $num_doc");
    $document = $selectdoc->fetch();
    $id_document = $document['id'];
    


    if(isset($_POST['submit'])){
        if(!empty($_POST['num-doc']) && !empty($_POST['entrer-sortie']) && !empty($_POST['lieu-dest'])  && !empty($_POST['motif'])){
                    
            $num_doc = htmlspecialchars($_POST['num-doc']);
            $entrer_sortie = htmlspecialchars($_POST['entrer-sortie']);
            $lieu_dest = htmlspecialchars($_POST['lieu-dest']);
            $motif = htmlspecialchars($_POST['motif']);

            $insert = $conn->prepare("INSERT INTO entrer_sortie(id_admin, id_document, num_document, enter_sortie, lieu_dest, motif) VALUES(?,?,?,?,?,?)");
            $insert->execute([$id_admin,$id_document,$num_doc,$entrer_sortie,$lieu_dest,$motif]);
                            
            // $msgsuccess = "Enregistrement avec succès.";
            header('location: ./repertoireJourney.php'); 
           

        }else{
            $msgError[] = "Veiller renseigner tous les champs !";
        }
    }

}else{
    header('location: ./repertoireUser.php');
}