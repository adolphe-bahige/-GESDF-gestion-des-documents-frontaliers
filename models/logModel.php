<?php
    require_once('../../models/db.php');

    if(isset($_POST['submit'])){
        if(!empty($_POST['email']) && !empty($_POST['password'])){

            $email = htmlspecialchars($_POST['email']);
            $Password = htmlspecialchars($_POST['password']);

            // verifier si le mot de passe et >= a 8 caracteres
            if(strlen($Password) >= 8 && preg_match('/[A-Za-z]/',$Password) && preg_match('/[0-9]/',$Password) && preg_match('/[^A-Za-z0-9]/',$Password)){

                $passHash = sha1($Password);
                $verify = $conn->prepare("SELECT email,password FROM admin WHERE email=? AND password=? ");
                $verify->execute([$email, $passHash]);

                $row= $verify->rowCount();

                if($row > 0){

                    session_start();
                    $_SESSION['authAdmin'] = [
                        'email'=>$email,
                    ];

                    header('location: ../../view/dashboard.php');
                    
                }else{
                    $msgPass[] = "Adresse e-mail ou mot de passe incorrect !";
                }
                

            }else{
                $msgPass[] = "* Le mot de passe doit contenir au moins 8 caractères, y compris des lettres, des chiffres et des caractères spéciaux !";
            }
        

        }else{
            $msgError[] = "Veiller renseigner tous les champs !";
        }
    }