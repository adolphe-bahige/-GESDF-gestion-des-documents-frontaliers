<?php
require('../models/db.php');

$readnotification = $conn->query("SELECT * FROM notifications ORDER BY created_at DESC");
$notifications = $readnotification->fetchAll(PDO::FETCH_ASSOC);
$rownotif = $readnotification->rowCount();
if ($rownotif <= 0) {
    $msgnotifVide = "Aucune nouvelle notification.";
} else {
    $notif = '<p class="w-3 h-3 bg-red-400 rounded-full absolute top-2 right-1 border border-red-400"></p>';
    echo $notif;
}
