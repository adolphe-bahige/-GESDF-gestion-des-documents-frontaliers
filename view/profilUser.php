<?php
require('../models/session.php');
// print_r($Authadmin);
require_once('../models/modelProfilUser.php');
require_once('../models/updatedoc.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Profil User</title>
</head>

<body>
    <main class="w-full h-auto ">
        <!-- navbar -->
        <?php
        require('./components/navbar.php');
        ?>

        <!-- section1 sidebar et content -->
        <div class="w-full h-auto flex bg-[whitesmoke] relative">
            <!-- sidebar -->
            <?php
            require('./components/sidebar.php');

            ?>


            <!-- dashbord -->
            <section class="w-full min-h-[90vh] flex flex-col space-y-4 p-2 lg:w-[80%] lg:ml-auto">

                <div class="w-full h-auto px-2 flex flex-col justify-between items-center bg-white md:flex-row py-1">
                    <h1 class="text-lg font-semibold">Profil d'une personne</h1>
                    <!-- messages errors -->
                    <span>
                        <p class="text-red-400 text-base">
                            <?php
                            if (isset($msgError)) {
                                echo $msgError;
                            }
                            ?>
                        </p>
                    </span>
                </div>

                <div class="w-full h-full p-2 bg-white">

                    <form action="" method="post" enctype="multipart/form-data" class="w-full h-auto flex flex-col items-start space-y-4 pb-4">

                        <div class="w-full h-auto flex flex-col gap-6 md:flex-row">

                            <!-- photo -->
                            <div class="w-full h-[46vh] px-2 rounded flex flex-col gap-2 md:w-[20%] md:h-[50vh] ">
                                <h2 class="text-lg font-medium">Profile</h2>

                                <div class="w-full flex flex-col items-center gap-2">
                                    <label for="select" class="relative border border-[#f5f5f5e1] w-full h-[35vh] flex justify-center items-center rounded">
                                        <img src="../imageUser/<?= $document['photo'] ?>" alt="" id="img" class="w-full h-full object-cover rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="avatar" class="w-12 h-12 hidden" width="4rem" height="4rem" viewBox="0 0 36 32">
                                            <path fill="currentColor" d="M.5 31.983a.503.503 0 0 0 .612-.354c1.03-3.843 5.216-4.839 7.718-5.435c.627-.149 1.122-.267 1.444-.406c2.85-1.237 3.779-3.227 4.057-4.679a.5.5 0 0 0-.165-.473c-1.484-1.281-2.736-3.204-3.526-5.416a.5.5 0 0 0-.103-.171c-1.045-1.136-1.645-2.337-1.645-3.294c0-.559.211-.934.686-1.217a.5.5 0 0 0 .243-.408C10.042 5.036 13.67 1.026 18.12 1l.107.007c4.472.062 8.077 4.158 8.206 9.324a.5.5 0 0 0 .178.369c.313.265.459.601.459 1.057c0 .801-.427 1.786-1.201 2.772a.5.5 0 0 0-.084.158c-.8 2.536-2.236 4.775-3.938 6.145a.5.5 0 0 0-.178.483c.278 1.451 1.207 3.44 4.057 4.679c.337.146.86.26 1.523.403c2.477.536 6.622 1.435 7.639 5.232a.5.5 0 0 0 .966-.26c-1.175-4.387-5.871-5.404-8.393-5.95c-.585-.127-1.09-.236-1.336-.344c-1.86-.808-3.006-2.039-3.411-3.665c1.727-1.483 3.172-3.771 3.998-6.337c.877-1.14 1.359-2.314 1.359-3.317c0-.669-.216-1.227-.644-1.663C27.189 4.489 23.19.076 18.227.005l-.149-.002c-4.873.026-8.889 4.323-9.24 9.83c-.626.46-.944 1.105-.944 1.924c0 1.183.669 2.598 1.84 3.896c.809 2.223 2.063 4.176 3.556 5.543c-.403 1.632-1.55 2.867-3.414 3.676c-.241.105-.721.22-1.277.352c-2.541.604-7.269 1.729-8.453 6.147a.5.5 0 0 0 .354.612" />
                                        </svg>
                                    </label>

                                    <label for="select" class="cursor-pointer rounded font-semibold text-sm text-blue-950">Capturé une photo</label>

                                    <input type="file" onchange="img.src = window.URL.createObjectURL(this.files[0]);img.classList.add('flex');avatar.classList.add('hidden')" name="photo" id="select" value="" class="hidden" accept="image/*">
                                </div>
                            </div>

                            <!-- others informations -->
                            <div class="w-full h-auto flex flex-col gap-4 py-2 md:w-[50%] md:px-4">
                                <h2 class="text-lg font-medium">Informations personnelles</h2>

                                <div class="w-full h-auto flex flex-col gap-4 md:gap-3">
                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Numero du document</p>
                                        <span class="w-full h-auto relative flex justify-center">
                                            <input type="text" name="num-doc" id="num-doc" value="<?= $document['num_document'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                            <label for="num-doc" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                    <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                </svg>
                                            </label>
                                        </span>
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Nom complet</p>
                                        <span class="w-full h-auto relative flex justify-center">
                                            <input type="text" name="name" id="name" value="<?= $document['name'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none capitalize md:py-1">
                                            <label for="name" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                    <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                </svg>
                                            </label>
                                        </span>
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Nationalite</p>
                                        <span class="w-full h-auto relative flex justify-center">
                                            <input type="text" name="nationalite" id="nationalite" value="<?= $document['nationality'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                            <label for="nationalite" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                    <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                </svg>
                                            </label>
                                        </span>
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Profession</p>
                                        <span class="w-full h-auto relative flex justify-center">
                                            <input type="text" name="profession" id="profession" value="<?= $document['profession'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                            <label for="profession" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                    <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                </svg>
                                            </label>
                                        </span>
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Type de document</p>
                                        <span class="w-full h-auto relative flex justify-center">
                                            <input type="text" name="type-document" id="type-document" value="<?= $document['type_document'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                            <label for="type-document" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                    <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                </svg>
                                            </label>
                                        </span>
                                    </div>

                                    <div class="w-full h-auto flex justify-between items-center">
                                        <div class="w-[48%] h-auto flex flex-col gap-1">
                                            <p class="text-sm font-medium">Délivrée le :</p>
                                            <span class="w-full h-auto relative flex justify-center">
                                                <input type="date" name="validite" id="validite" value="<?= $document['validity'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                                <label for="validite" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                        <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                    </svg>
                                                </label>
                                            </span>

                                        </div>

                                        <div class="w-[48%] h-auto flex flex-col gap-1">
                                            <p class="text-sm font-medium">Expirant le :</p>
                                            <span class="w-full h-auto relative flex justify-center">
                                                <input type="date" name="invalidite" id="invalidite" value="<?= $document['invalidity'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                                <label for="invalidite" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                        <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                    </svg>
                                                </label>
                                            </span>
                                        </div>

                                    </div>

                                    <div class="w-full h-auto flex items-center gap-2">
                                        <p class="text-sm font-medium">Statut : </p>
                                        <?php
                                        if ($document['statut'] == "valide") {
                                        ?>
                                            <p class="px-5 py-1 rounded-md bg-green-400 text-white "><?= $document['statut'] ?></p>
                                        <?php

                                        } else {
                                        ?>
                                            <p class="px-5 py-1 rounded-md bg-rose-400 text-white "><?= $document['statut'] ?></p>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="w-full h-auto flex justify-center items-center">
                            <button type="submit" name="submit" class="px-12 py-2 text-base font-medium rounded bg-indigo-500 text-white ">Modifier</button>
                        </div>

                    </form>

                </div>
            </section>
        </div>

    </main>

    <?php
    require_once('./components/notification.php');

    ?>


    <script src="../js/image.js"></script>
</body>

</html>