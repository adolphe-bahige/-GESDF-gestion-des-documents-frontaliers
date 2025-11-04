<?php
    require_once('../../models/logModel.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../output.css">
    <title>Authentification Admin</title>
</head>
<body>
    <section class="w-full h-screen flex items-center ">
        <div class="w-1/2 h-full hidden lg:flex justify-between bg-[whitesmoke]">
            <img src="../../images/sign-in-animate.svg" alt="" class=" object-cover">
        </div>

        <div class="w-full h-full flex flex-col justify-center items-center lg:w-1/2 bg-white">
            <div class=" w-[90%] h-auto flex flex-col justify-center gap-6 md:w-[65%]">
                <div class="flex flex-col gap-2 text-center md:text-start">
                    <h1 class="font-semibold text-2xl font-[cursive] md:text-3xl">Bienvenue dans notre systeme</h1>
                    <p class="text-base text-gray-500 text-center">S'authentifier pour continuer</p>
                </div>

                <!-- msg error -->
                <div class="errors text-red-400 flex justify-center">
                    <?php
                        if(isset($msgError)){
                            foreach($msgError as $msgError){
                                echo $msgError;
                            }
                        }
                    ?>
                </div>
                <form action="" method="post" class="w-full h-auto flex flex-col gap-10 items-center">
    
                    <div class="w-full h-auto flex flex-col gap-4 text-base">
                            
                        <input type="email" name="email" id="email" placeholder="Enter your @mail" class="border-b border-indigo-300 w-full py-1 outline-none pr-1">
    
                        <input type="password" name="password" id="password" minlength="8" placeholder="Enter your password" class="border-b border-indigo-300 w-full py-1 outline-none pr-1">

                        <!-- messages errors -->
                        <span>
                            <p class="text-red-400 text-xs">
                                <?php
                                    if(isset($msgPass)){
                                        foreach($msgPass as $msgPass){
                                            echo $msgPass;
                                        }
                                    }
                                ?>
                            </p>
                        </span>
                        
                        <div class="w-full h-auto flex justify-end">
                            <a href="#" class="text-sm text-indigo-800 underline">Mot de passe oublié</a> 
                        </div>
                    </div>
                   
                        
                    <button type="submit" name="submit" class="w-full h-[2.5rem] text-base font-medium rounded-full bg-indigo-500 text-white md:w-[90%]">Se connecter</button>
                </form>

            
                <div class="w-full flex items-center justify-center gap-2 px-10">
                    <div class=" bg-indigo-400 w-full h-[.1rem]"></div>
                    <p class="text-sm text-indigo-400 font-medium pb-1">or</p>
                    <div class=" bg-indigo-400 w-full h-[.1rem]"></div>
                </div>
    
            </div>
                        
            <span class="w-full flex flex-wrap items-center justify-center gap-1 text-sm ">
                <a href="./signAdmin.php" class="text-blue-500 underline">Créé un compte,</a>
                <p class="text-gray-500"> Si vous n'en avez pas.</p>
            </span>
        </div>
        
    </section>
</body>
</html>