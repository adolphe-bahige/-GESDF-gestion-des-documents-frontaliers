<?php
//    require('../models/session.php'); la session est inclus dans le font addDocs;
require_once('../models/db.php');

//    $id_admin = $Authadmin['id']; se trouve deja dans la session;
//    echo $id_admin;


if (isset($_POST['submit'])) {
    if (!empty(!empty($_POST['name']) && !empty($_POST['nationalite']) && !empty($_POST['profession']) && !empty($_POST['type-document'])
        && !empty($_POST['validite']) && !empty($_POST['invalidite']) && $_FILES['photo'])) {

        $name = htmlspecialchars(ucfirst(strtolower($_POST['name'])));
        $nationalite = htmlspecialchars($_POST['nationalite']);
        $profession = htmlspecialchars($_POST['profession']);
        $typedocument = htmlspecialchars($_POST['type-document']);
        $validite = htmlspecialchars($_POST['validite']);
        $invalidite = htmlspecialchars($_POST['invalidite']);

        $namephoto = $_FILES["photo"]['name'];
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        move_uploaded_file($photo_tmp_name, "../imageUser/$namephoto");


        $insert = $conn->prepare("INSERT INTO documents(id_admin, name, nationality, profession, type_document, validity, invalidity, photo) VALUES(?,?,?,?,?,?,?,?)");
        $insert->execute([$id_admin, $name, $nationalite, $profession, $typedocument, $validite, $invalidite, $namephoto]);

        $lastId = $conn->lastInsertId();
        $count = $conn->query("SELECT COUNT(*) FROM documents")->fetchColumn();
        $numeroOrdre = str_pad($count, 2, '0', STR_PAD_LEFT);
        $numdoc = '257' . $lastId . $numeroOrdre;
        $update = $conn->prepare("UPDATE documents SET num_document=? WHERE id=?");
        $update->execute([$numdoc, $lastId]);

        if ($insert->rowCount() > 0) {
            $action = 'enregistrement';
            $notification = "Un nouveau $typedocument a été enregistré au nom de : $name";
            $insertNotif = $conn->prepare("INSERT INTO notifications(num_document,message, actions) VALUES(?,?,?)");
            $insertNotif->execute([$numdoc, $notification, $action]);
        }

        // $msgsuccess = "Enregistrement avec succès.";
        header('location: ./repertoireUser.php');
    } else {
        $msgError[] = "Veiller renseigner tous les champs !";
    }
}



// if (isset($_POST['submit'])) {
//     if (!empty(!empty($_POST['num-doc']) && !empty($_POST['name']) && !empty($_POST['nationalite']) && !empty($_POST['profession']) && !empty($_POST['type-document'])  && !empty($_POST['validite']) && !empty($_POST['invalidite']) && $_FILES['photo'])) {

//         $numdoc = htmlspecialchars($_POST['num-doc']);
//         $name = htmlspecialchars(ucfirst(strtolower($_POST['name'])));
//         $nationalite = htmlspecialchars($_POST['nationalite']);
//         $profession = htmlspecialchars($_POST['profession']);
//         $typedocument = htmlspecialchars($_POST['type-document']);
//         $validite = htmlspecialchars($_POST['validite']);
//         $invalidite = htmlspecialchars($_POST['invalidite']);

//         $namephoto = $_FILES["photo"]['name'];
//         $photo_tmp_name = $_FILES['photo']['tmp_name'];
//         move_uploaded_file($photo_tmp_name, "../imageUser/$namephoto");


//         $verify = $conn->prepare("SELECT num_document,type_document FROM documents WHERE num_document=? AND type_document=?");
//         $verify->execute([$numdoc, $typedocument]);
//         $row = $verify->rowCount();

//         if ($row > 0) {

//             $msgError[] = "L'utlisateur existe déjà !";
//         } else {
//             $insert = $conn->prepare("INSERT INTO documents(id_admin, num_document, name, nationality, profession, type_document, validity, invalidity, photo) VALUES(?,?,?,?,?,?,?,?,?)");
//             $insert->execute([$id_admin, $numdoc, $name, $nationalite, $profession, $typedocument, $validite, $invalidite, $namephoto]);

//             if ($insert->rowCount() > 0) {
//                 $action = 'enregistrement';
//                 $notification = "Un nouveau $typedocument a été enregistré au nom de : $name";
//                 $insertNotif = $conn->prepare("INSERT INTO notifications(num_document,message, actions) VALUES(?,?,?)");
//                 $insertNotif->execute([$numdoc, $notification, $action]);
//             }

//             // $msgsuccess = "Enregistrement avec succès.";
//             header('location: ./repertoireUser.php');
//         }
//     } else {
//         $msgError[] = "Veiller renseigner tous les champs !";
//     }
// }
