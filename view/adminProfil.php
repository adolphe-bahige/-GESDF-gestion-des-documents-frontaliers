<?php
include '../models/db.php';
include '../models/updateProfilAdmin.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Profil Admin</title>
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
                    <div class=" flex flex-wrap gap-2 md:gap-10 lg:gap-16">
                        <h1 class="text-lg font-semibold">Profil d'une personne</h1>
                        <a href="../models/deleteDoc.php?idadmin=<?= $Authadmin['id'] ?>" class="text-red-400 flex gap-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 28 28" class="text-[1.1rem]">
                                <path fill="currentColor" d="M11.5 6h5a2.5 2.5 0 0 0-5 0M10 6a4 4 0 0 1 8 0h6.25a.75.75 0 0 1 0 1.5h-1.31l-1.217 14.603A4.25 4.25 0 0 1 17.488 26h-6.976a4.25 4.25 0 0 1-4.235-3.897L5.06 7.5H3.75a.75.75 0 0 1 0-1.5zm2.5 5.75a.75.75 0 0 0-1.5 0v8.5a.75.75 0 0 0 1.5 0zm3.75-.75a.75.75 0 0 0-.75.75v8.5a.75.75 0 0 0 1.5 0v-8.5a.75.75 0 0 0-.75-.75" />
                            </svg>
                            <p>Supprimer mon compte</p>
                        </a>
                    </div>

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
                                <h2 class="text-lg font-medium">Logo</h2>

                                <div class="w-full flex flex-col items-center gap-2">
                                    <label for="select" class="relative border border-[#f5f5f5e1] w-full h-[35vh] flex justify-center items-center rounded">

                                        <?php
                                        if (!empty($Authadmin['photo'])) {
                                            $imagePath1 = "../imageUser/" . $Authadmin['photo'];
                                        ?>
                                            <img src="<?= $imagePath1; ?>" alt="profile" id="img" class="w-full h-full object-cover z-10 rounded">
                                        <?php

                                        } else {
                                            echo $imagePath2 =
                                                '<svg id="avatar" xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 48 48">
                                                <path fill="gray" d="M16.8 9.186A4.25 4.25 0 0 1 20.515 7h6.97A4.25 4.25 0 0 1 31.2 9.186l1.286 2.314h3.764A5.75 5.75 0 0 1 42 17.25v6.794A12.94 12.94 0 0 0 35 22c-1.181 0-2.326.158-3.414.453a8 8 0 1 0-9.4 10.34a13.085 13.085 0 0 0 .81 7.207H11.75A5.75 5.75 0 0 1 6 34.25v-17a5.75 5.75 0 0 1 5.75-5.75h3.764L16.8 9.186ZM24 19.5a5.5 5.5 0 0 0-1.155 10.879a13.045 13.045 0 0 1 6.4-7.039A5.503 5.503 0 0 0 24 19.5ZM35 46c6.075 0 11-4.925 11-11s-4.925-11-11-11s-11 4.925-11 11s4.925 11 11 11Zm0-18a1 1 0 0 1 1 1v5h5a1 1 0 1 1 0 2h-5v5a1 1 0 1 1-2 0v-5h-5a1 1 0 1 1 0-2h5v-5a1 1 0 0 1 1-1Z" />
                                            </svg>';
                                        }

                                        ?>
                                    </label>

                                    <label for="select" class="cursor-pointer rounded font-semibold text-sm text-blue-950">Capturé une photo</label>

                                    <input type="file" name="photo" id="select" value="" required class="text-xs w-[80%] " accept="image/*" onchange="img.src = window.URL.createObjectURL(this.files[0]);img.classList.add('flex');avatar.classList.add('hidden')">
                                </div>
                            </div>

                            <!-- others informations -->
                            <div class="w-full h-auto flex flex-col gap-4 py-2 md:w-[50%] md:px-4">
                                <h2 class="text-lg font-medium">Informations personnelles</h2>

                                <div class="w-full h-auto flex flex-col gap-4 md:gap-3">

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Nom d'utilisateur</p>
                                        <span class="w-full h-auto relative flex justify-center">
                                            <input type="text" name="name" id="name" required value="<?= $Authadmin['name'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none capitalize md:py-1">
                                            <label for="name" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                    <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                </svg>
                                            </label>
                                        </span>
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Adresse E-mail</p>
                                        <span class="w-full h-auto relative flex justify-center">
                                            <input type="email" name="email" id="email" required value="<?= $Authadmin['email'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                            <label for="email" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                    <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                </svg>
                                            </label>
                                        </span>
                                    </div>

                                    <div class="w-full h-auto flex flex-col gap-1">
                                        <p class="text-sm font-medium">Mot de passe</p>
                                        <span class="w-full h-auto relative flex justify-center">
                                            <input type="password" name="password" id="password" required placeholder="* Entrez le nouveau ou l'ancien mot de passe" class="border w-[100%] py-2 pl-3 pr-8 text-sm rounded outline-none md:py-1">
                                            <label for="password" class="w-8 h-full flex justify-center items-center bg-indigo-500 absolute top-0 right-0 text-white rounded-r cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="text-xl md:text-[1.1rem]">
                                                    <path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                </svg>
                                            </label>
                                        </span>
                                    </div>

                                    <div class="w-full h-auto flex gap-1">
                                        <input type="checkbox" name="role" id="text" required value="<?= $Authadmin['role'] ?>" checked>
                                        <label for="text"><?= $Authadmin['role'] ?></label>
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