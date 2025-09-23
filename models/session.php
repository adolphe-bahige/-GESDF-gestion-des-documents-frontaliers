<?php

require('../models/db.php');
session_start();


$adminSelect = $conn->query('SELECT * FROM admin');
$admin =$adminSelect->fetchAll(PDO::FETCH_ASSOC);
// $row = $adminSelect->rowCount();


if($_SESSION['authAdmin']  <= 0) {

    header('location: ../view/load_sign_up_log_in_out/logAdmin.php');

}else{
    $verify = $conn->prepare("SELECT * FROM admin WHERE email=?");
    $verify->execute([$_SESSION['authAdmin']['email']]);
    $Authadmin = $verify->fetch(PDO::FETCH_ASSOC);
    $id_admin = $Authadmin['id'];

    // header('location: ./view/dashboard.php');
}