<?php
    require_once('../../models/signModel.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../output.css">
    <title>Inscription Admin</title>
</head>
<body>
    <section class="w-full h-screen flex items-center">
        <div class="w-1/2 h-full hidden lg:flex justify-between bg-[whitesmoke]">
            <img src="../../images/Sign up.gif" alt="" class="w-full h-full">
        </div>

        <div class="w-full h-full flex justify-center items-center lg:w-1/2">
            <div class=" w-[90%] h-auto flex flex-col justify-center gap-6 md:w-[65%]">
                <div class="flex flex-col gap-2 text-center md:text-start">
                    <h1 class="font-semibold text-2xl font-[cursive] md:text-3xl">Bienvenue dans notre systeme</h1>
                    <p class="text-base text-gray-500 text-center">Creer un compte pour continuer</p>
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
    
                    <div class="w-full h-auto flex flex-col gap-5 text-base">
                        <input type="text" name="name" id="name" placeholder="Enter your username" class="border-b border-indigo-300 w-full py-1 outline-none pr-1 bg-transparent">
    
                        <input type="email" name="email" id="email" placeholder="Enter your @mail" class="border-b border-indigo-300 w-full py-1 outline-none pr-1 bg-transparent">

                        <div class="w-full h-auto flex flex-col gap-5 ">
                        
                            <input type="password" name="password" id="pass" minlength="8" placeholder="Enter your password" class="border-b border-indigo-300 w-full py-1 outline-none pr-1 bg-transparent">
    
                            <input type="password" name="cfrpass" id="cfrpass" minlength="8" placeholder="confirm your password" class="border-b border-indigo-300 w-full py-1 outline-none pr-1 bg-transparent"> 
                            
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

                        </div>

                        <label for="check" class="flex items-center gap-1 font-medium">
                            <input type="checkbox" name="role" id="check" value="administrateur" class="w-4 h-4">
                            <p class="text-sm text-gray-500">Administrateur</p> 
                        </label>
                    </div>
                   
                        
                    <button type="submit" name="submit" class="w-full h-[2.5rem] text-base font-medium rounded-full bg-indigo-500 text-white md:w-[90%]">S'incrire</button>
                </form>
            </div>
                        

        </div>
        
    </section>
</body>
</html>