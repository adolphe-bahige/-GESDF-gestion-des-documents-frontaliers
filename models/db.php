<?php
try {
    
    $conn = new PDO("mysql:host=localhost;dbname=gestion_docs;charset=utf8","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $th) {

    echo 'echec';

}