<?php
require_once('../models/db.php');

// spacifier les documents expirés
$update = $conn->prepare("UPDATE documents SET statut = 'expiré' WHERE invalidity < CURDATE()");
$update->execute();

// tous les documents
$read = $conn->query("SELECT d.id, d.name AS doc_name, d.nationality, d.profession, d.type_document, d.validity, d.invalidity, d.photo, 
    d.num_document, d.statut, d.created_at, a.name AS admin_name  
    FROM documents d JOIN admin a ON d.id_admin = a.id ORDER BY created_at
");
// $read = $conn->query("SELECT * FROM documents ORDER BY created_at");
$documents = $read->fetchAll(PDO::FETCH_ASSOC);
$rowdoc = $read->rowCount();
if ($rowdoc <= 0) {
    $msgDocsVide = "Aucun document enregistrer.";
}

// les documents valides
$sqlValide = $conn->prepare("SELECT * FROM documents WHERE statut = 'valide' ORDER BY created_at");
$sqlValide->execute();
$ValideDocs = $sqlValide->fetchAll(PDO::FETCH_ASSOC);
$rowValide = $sqlValide->rowCount();
if ($rowValide <= 0) {
    $msgDocsValideVide = "Aucun document n'est valide .";
}

// les documents invalides
$sqlExpire = $conn->prepare("SELECT * FROM documents WHERE statut = 'expiré' ORDER BY created_at");
$sqlExpire->execute();
$ExpireDocs = $sqlExpire->fetchAll(PDO::FETCH_ASSOC);
$rowExpire = $sqlExpire->rowCount();
if ($rowExpire <= 0) {
    $msgDocsExpireVide = "Aucun document n'est invalide .";
}


// nombre des nationaux
$nationality = "burundaise";

$readnationaux = $conn->prepare("SELECT nationality FROM documents WHERE nationality = ? ORDER BY id DESC LIMIT 10");
$readnationaux->execute([$nationality]);
$rownation = $readnationaux->rowCount();
if ($rownation <= 0) {
    $msgnationaux = "Aucun document national enregistrer.";
}
// nombre des etrangers
$nbetranger = $rowdoc - $rownation;

// acceder a certains info d'un document grace a la cle etrangere pour les nationaux
$sqlNationaux = $conn->query("SELECT e.id, e.enter_sortie, d.num_document, d.nationality FROM entrer_sortie e JOIN documents d ON e.id_document = d.id WHERE d.nationality = 'burundaise'");
$EntrerSortieNationaux = $sqlNationaux->fetchAll(PDO::FETCH_ASSOC);
$rowESNationaux = count($EntrerSortieNationaux);
if ($rowESNationaux <= 0) {
    $msgESNationaux = "Aucun national n'est entrer ou sortie.";
}

// acceder a certains info d'un document grace a la cle etrangere pour les etrangers
$sqlEtranger = $conn->query("SELECT e.id, e.enter_sortie, d.num_document, d.nationality FROM entrer_sortie e JOIN documents d ON e.id_document = d.id WHERE d.nationality != 'burundaise'");
$EntrerSortieEntrangers = $sqlEtranger->fetchAll(PDO::FETCH_ASSOC);
$rowESEtrangers = count($EntrerSortieEntrangers);
if ($rowESEtrangers <= 0) {
    $msgESEtrangers = "Aucun etranger n'est entrer ou sortie.";
}
