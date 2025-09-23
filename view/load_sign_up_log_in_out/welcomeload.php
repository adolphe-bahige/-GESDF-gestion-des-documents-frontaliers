<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../output.css">
    <title>Welcome</title>
</head>
<body>
    <section class="w-full h-screen flex items-center">
        <div class="w-1/2 h-full hidden lg:flex justify-between bg-[whitesmoke]">
            <img src="../../images/Welcome-amico.png" alt="" class="w-full h-full">
        </div>

        <div class="w-full h-full flex flex-col justify-center items-center gap-10 lg:w-1/2">
            <div class="w-[90%] h-auto flex flex-col justify-center items-center text-center gap-4 md:w-[80%]">
                <h1 class="font-semibold text-3xl font-[cursive]">Bienvenue dans notre systeme!</h1>
                <p class="text-base font-medium text-[#000000c2]">Enregister des nouveaux voyageurs qui vont traverser <br class="hidden md:flex"> la frontière dans cette journée.</p>
            </div>
            <div class="w-[90%] h-auto flex flex-col justify-center items-center gap-4 md:w-[80%]">
                <a href="./logAdmin.php" type="submit" name="submit" class="w-full h-[3rem] text-base font-semibold rounded bg-indigo-500 text-white flex justify-center items-center hover:bg-indigo-50 hover:text-black hover:border-2 hover:transition-[1s] md:w-[80%]">Se connecter</a>
                <a href="./signAdmin.php" type="submit" name="submit" class="w-full h-[3rem] text-base font-semibold rounded bg-indigo-200 text-black flex justify-center items-center hover:bg-[whitesmoke] hover:border-2 hover:transition-[1s] md:w-[80%]">S'incrire</a>
            </div>

        </div>
        
    </section>
</body>
</html>