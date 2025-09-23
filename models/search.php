<?php
include '../models/db.php';

$documents = [];


if (!empty($_GET['search'])) {
    $search = '%' . $_GET['search'] . '%';

    // $sql = $conn->prepare("SELECT * FROM documents WHERE LOWER(name) LIKE ? OR LOWER(num_document) LIKE ? OR LOWER(nationality) LIKE ? OR LOWER(type_document) LIKE ?");
    $sql = $conn->query("SELECT d.id, d.name AS doc_name, d.nationality, d.profession, d.type_document, d.validity, d.invalidity, d.photo, 
    d.num_document, d.statut, d.created_at, a.name AS admin_name  
    FROM documents d JOIN admin a ON d.id_admin = a.id 
    WHERE d.name LIKE ? OR d.num_document LIKE ? OR d.nationality LIKE ? OR d.type_document LIKE ?  ORDER BY created_at");

    $sql->execute([$search, $search, $search, $search]);
} else {
    $sql = $conn->query("SELECT d.id, d.name AS doc_name, d.nationality, d.profession, d.type_document, d.validity, d.invalidity, d.photo, 
    d.num_document, d.statut, d.created_at, a.name AS admin_name  
    FROM documents d JOIN admin a ON d.id_admin = a.id ORDER BY created_at");
    // $sql = $conn->query("SELECT * FROM documents");
}

$documents = $sql->fetchAll(PDO::FETCH_ASSOC);
