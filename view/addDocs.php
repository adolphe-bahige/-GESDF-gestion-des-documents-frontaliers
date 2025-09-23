<?php
require('../models/session.php');
// print_r($Authadmin);
require_once('../models/modelAddDocs.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Ajouter un document d'une personne</title>
</head>

<body>
    <main class="w-full h-auto ">

        <!-- navbar  -->
        <?php
        require('./components/navbar.php');
        ?>

        <!-- section1 -->
        <div class="w-full h-auto flex bg-[whitesmoke] relative">
            <!-- sidebar  -->
            <?php
            require('./components/sidebar.php');
            ?>

            <!-- dashbord -->
            <section class="w-full min-h-[90vh] flex flex-col space-y-4 p-2 lg:w-[80%] lg:ml-auto">

                <div class="w-full h-auto px-2 flex flex-col justify-between items-center bg-white md:flex-row py-1">
                    <h1 class="text-lg font-semibold">Ajouter le document d'une personne</h1>
                    <!-- messages errors -->
                    <span>
                        <p class="text-red-400 text-base">
                            <?php
                            if (isset($msgError)) {
                                foreach ($msgError as $msgError) {
                                    echo $msgError;
                                }
                            }
                            ?>
                        </p>
                        <p class="text-green-400 text-base">
                            <?php
                            if (isset($msgsuccess)) {
                                echo $msgsuccess;
                            }
                            ?>
                        </p>
                    </span>
                    <!-- <button type="submit" name="submit" class="w-full h-[2.5rem] text-base font-medium rounded bg-indigo-500 text-white md:w-[20%]">Enregistrer</button>  -->
                </div>

                <div class="w-full h-full p-2 bg-white">

                    <form action="" method="post" enctype="multipart/form-data" class="w-full h-auto flex flex-col items-start space-y-4 pb-4">
                        <div class="w-full h-auto flex flex-col gap-6 md:flex-row">

                            <div class="w-full h-auto flex flex-col gap-4 py-2 md:w-[50%] rounded md:px-4 md:border">
                                <!-- others informations -->
                                <h2 class="text-lg font-medium">Informations personnelles</h2>
                                <div class="w-full h-auto flex flex-col gap-4 md:gap-3">

                                    <!-- <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Numero du document</p>
                                        <input type="text" name="num-doc" id="num-doc" placeholder="Ex: 502584" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                    </div> -->

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Nom complet</p>
                                        <input type="text" name="name" id="name" placeholder="Ex: Nelson AKANA CHIKURU" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none capitalize md:py-1">
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Nationalite</p>
                                        <input type="text" name="nationalite" id="nationalite" placeholder="Ex: CONGOLAISE" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Profession</p>
                                        <input type="text" name="profession" id="profession" placeholder="EX: ETUDIANT" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <label for="type-document" class="text-sm font-medium">Type de document</label>
                                        <select name="type-document" id="type-document" class="border w-[100%] py-2 pl-3 text-sm font-semibold rounded outline-none md:py-1">
                                            <option value="" selected disabled>Choisir le document :</option>
                                            <option value="cpgl">CPGL</option>
                                            <option value="passe-port">PASSE-PORT</option>
                                            <option value="laisser passer">LAISSER PASSER</option>
                                            <option value="tenant-lieu">TENANT-LIEU</option>
                                        </select>
                                    </div>

                                    <div class="w-full h-auto flex justify-between items-center">
                                        <div class="w-[48%] h-auto flex flex-col gap-1">
                                            <p class="text-sm font-medium">Délivrée le :</p>
                                            <input type="date" name="validite" id="validite" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                        </div>

                                        <div class="w-[48%] h-auto flex flex-col gap-1">
                                            <p class="text-sm font-medium">Expirant le :</p>
                                            <input type="date" name="invalidite" id="invalidite" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="border w-full h-[30vh] px-4 py-2 rounded md:w-[25%]">
                                <h2 class="text-lg font-medium">Profile</h2>
                                <div class="flex flex-col items-center p-4 gap-2 ">
                                    <label for="select" class="relative border border-[#1a1a421f] w-24 h-24 flex justify-center items-center rounded-full md:w-20 md:h-20">
                                        <img alt="" id="img" class="w-full h-full rounded-full object-cover hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="avatar" class="w-12 h-12 flex" width="4rem" height="4rem" viewBox="0 0 36 32">
                                            <path fill="currentColor" d="M.5 31.983a.503.503 0 0 0 .612-.354c1.03-3.843 5.216-4.839 7.718-5.435c.627-.149 1.122-.267 1.444-.406c2.85-1.237 3.779-3.227 4.057-4.679a.5.5 0 0 0-.165-.473c-1.484-1.281-2.736-3.204-3.526-5.416a.5.5 0 0 0-.103-.171c-1.045-1.136-1.645-2.337-1.645-3.294c0-.559.211-.934.686-1.217a.5.5 0 0 0 .243-.408C10.042 5.036 13.67 1.026 18.12 1l.107.007c4.472.062 8.077 4.158 8.206 9.324a.5.5 0 0 0 .178.369c.313.265.459.601.459 1.057c0 .801-.427 1.786-1.201 2.772a.5.5 0 0 0-.084.158c-.8 2.536-2.236 4.775-3.938 6.145a.5.5 0 0 0-.178.483c.278 1.451 1.207 3.44 4.057 4.679c.337.146.86.26 1.523.403c2.477.536 6.622 1.435 7.639 5.232a.5.5 0 0 0 .966-.26c-1.175-4.387-5.871-5.404-8.393-5.95c-.585-.127-1.09-.236-1.336-.344c-1.86-.808-3.006-2.039-3.411-3.665c1.727-1.483 3.172-3.771 3.998-6.337c.877-1.14 1.359-2.314 1.359-3.317c0-.669-.216-1.227-.644-1.663C27.189 4.489 23.19.076 18.227.005l-.149-.002c-4.873.026-8.889 4.323-9.24 9.83c-.626.46-.944 1.105-.944 1.924c0 1.183.669 2.598 1.84 3.896c.809 2.223 2.063 4.176 3.556 5.543c-.403 1.632-1.55 2.867-3.414 3.676c-.241.105-.721.22-1.277.352c-2.541.604-7.269 1.729-8.453 6.147a.5.5 0 0 0 .354.612" />
                                        </svg>
                                    </label>

                                    <label for="select" class="cursor-pointer rounded font-semibold text-sm text-blue-950">Capturé une photo</label>

                                    <input type="file" onchange="img.src = window.URL.createObjectURL(this.files[0]);img.classList.remove('hidden');avatar.classList.add('hidden')" name="photo" id="select" value="" class="hidden" accept="image/*">
                                </div>
                            </div>

                        </div>

                        <div class="w-full h-auto flex justify-center items-center">
                            <button type="submit" name="submit" class="px-12 py-2 text-base font-medium rounded bg-indigo-500 text-white ">Enregistrer</button>
                        </div>

                    </form>

                </div>
            </section>

        </div>
    </main>

    <?php
    require_once('./components/notification.php');

    ?>

</body>

</html>