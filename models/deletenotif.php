<?php
require('./db.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $deleteOneNotif = $conn->query("DELETE FROM notifications WHERE id=$id");
    header('location: ../view/dashboard.php');
}

// selete all notifications
if(isset($_GET['delete'])){
    $deleteAllNotif = $_GET['delete'];
    $deleteAllNotif = $conn->query("DELETE FROM notifications");
    header('location: ../view/dashboard.php');
}