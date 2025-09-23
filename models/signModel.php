<?php
    require_once('../../models/db.php');

if(isset($_POST['submit'])){

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cfrpass']) && !empty($_POST['role'])){

        
        $name = htmlspecialchars(ucfirst(strtolower($_POST['name'])));
        $email = htmlspecialchars($_POST['email']);
        $Password = htmlspecialchars($_POST['password']);
        $cfrpass = htmlspecialchars($_POST['cfrpass']);
        $role = htmlspecialchars($_POST['role']);

        // verifier si le mot de passe et >= a 8 caracteres
        if(strlen($Password) >= 8 && preg_match('/[A-Za-z]/',$Password) && preg_match('/[0-9]/',$Password) && preg_match('/[^A-Za-z0-9]/'
        ,$Password)){
            
            // verifier si les passwords correspondent
            if($Password === $cfrpass){
                
                $PasswordHash = sha1($Password);
            
                $verify = $conn->prepare("SELECT email,password FROM admin WHERE email=? OR password=?");
                $verify->execute([$email,$PasswordHash]);
                $row = $verify->rowCount();
                
                if($row > 0){
                    $msgError[] = "L'utlisateur existe déjà !";
                }else{
                    $insert = $conn->prepare("INSERT INTO admin(name,email,password,role) VALUES(?,?,?,?)");
                    $insert->execute([$name,$email,$PasswordHash,$role]);
                    
                    session_start();
                    $_SESSION['authAdmin'] = [
                        'email'=> $email,
                    ];
                    

                    header('location: ../dashboard.php');
                    
                }

            }else{
                $msgPass[] = "* Les deux mots de passe ne correspondent pas !";
            }

        }else{
            $msgPass[] = "* Le mot de passe doit contenir au moins 8 caractères, y compris des lettres, des chiffres et des caractères spéciaux !";
        }
        

    }else{
        $msgError[] = "Veiller renseigner tous les champs !";
    }
}