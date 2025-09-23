<?php
require_once('../models/db.php');

if (isset($_GET['id'])) {
    $idDoc = $_GET['id'];

    $selectdoc = $conn->query("DELETE  FROM documents WHERE id=$idDoc");

    header('location: ../view/repertoireUser.php');
}

if (isset($_GET['idadmin'])) {
    $idadmin = $_GET['idadmin'];

    $selectIdAdmin = $conn->query("DELETE  FROM admin WHERE id=$idadmin");

    header('location: ../view/load_sign_up_log_in_out/logAdmin.php');
}

// delete all docs expire
if (isset($_GET['expire'])) {
    $expireDoc = $_GET['expire'];

    $sqlExpireDoc = $conn->query("DELETE  FROM documents WHERE statut = 'expiré' ");

    header('location: ../view/historiqueDocs.php?deleted=1');
}
