<?php
include '../models/db.php';
include '../models/session.php';

$idAdmin = $Authadmin['id'];

if (isset($_POST['submit'])) {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role']) && !empty($_FILES['photo'])) {


        $name = htmlspecialchars(ucfirst(strtolower($_POST['name'])));
        $email = htmlspecialchars($_POST['email']);
        $Password = htmlspecialchars($_POST['password']);
        $role = htmlspecialchars($_POST['role']);

        $namephoto = $_FILES["photo"]['name'];
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        move_uploaded_file($photo_tmp_name, "../imageUser/$namephoto");

        // verifier si le mot de passe et >= a 8 caracteres
        if (strlen($Password) >= 8 && preg_match('/[A-Za-z]/', $Password) && preg_match('/[0-9]/', $Password) && preg_match(
            '/[^A-Za-z0-9]/',
            $Password
        )) {

            // verifier si les passwords correspondent

            $PasswordHash = sha1($Password);

            $update = $conn->prepare("UPDATE admin SET name=?, email=?, password=?, role=?, photo=? WHERE id=?");
            $update->execute([$name, $email, $PasswordHash, $role, $namephoto, $idAdmin]);

            session_start();
            $_SESSION['authAdmin'] = [
                'email' => $email,
            ];

            header('location: adminProfil.php');
        } else {
            $msgPass[] = "* Le mot de passe doit contenir au moins 8 caractères, y compris des lettres, des chiffres et des caractères spéciaux !";
        }
    } else {
        $msgError[] = "Veiller renseigner tous les champs !";
    }
}
