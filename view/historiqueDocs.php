<?php
require('../models/session.php');
// print_r($Authadmin);
require_once('../models/readAllDocuments.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Repertoire des documents invalides</title>
</head>

<body>
    <main class="w-full h-auto ">
        <!-- navbar -->
        <?php
        require('./components/navbar.php');
        ?>

        <!-- section1 -->
        <div class="w-full h-auto flex bg-[whitesmoke] relative">
            <!-- sidebar -->
            <?php
            require('./components/sidebar.php');
            ?>

            <!-- dashbord -->
            <section class="w-full min-h-[90vh] flex flex-col space-y-4 p-2 lg:w-[80%] lg:ml-auto">

                <div class="w-full h-auto px-2 flex flex-col justify-between items-center bg-white md:flex-row py-1">
                    <h1 class="text-lg font-semibold">Historique des documents (valides et invalides)</h1>

                    <!-- message de suppression reussie -->
                    <?php
                    if (isset($_GET['deleted'])) {
                        echo '<p class="text-green-400"> ✔✔ Success! Documents expirés supprimés.</p>';
                    }
                    ?>

                </div>

                <div class="w-full min-h-[78vh] py-1 grid grid-cols-1 gap-6 lg:grid-cols-2">

                    <!-- tableau valides 1-->
                    <div class="w-full h-full p-2 bg-white flex flex-col gap-4">

                        <h1>Documents valides.</h1>
                        <div class="w-full h-auto flex flex-col gap-1 text-sm">
                            <!-- head -->

                            <div class="border w-full h-auto flex font-medium rounded bg-[whitesmoke]">
                                <div class="w-[30%] h-auto p-1 ">N<sup>o</sup> du docmt</div>
                                <div class="w-[35%] h-auto p-1 ">Type-docmt</div>
                                <div class="w-[20%] h-auto p-1 ">Statut</div>
                                <div class="w-[15%] h-auto p-1 ">Actions</div>
                            </div>
                            <!-- tobody -->
                            <?php foreach ($ValideDocs as $ValideDoc): ?>
                                <div class="border w-full h-auto flex  rounded">
                                    <div class="w-[30%] h-auto p-1 "><?= $ValideDoc['num_document'] ?></div>
                                    <div class="w-[35%] h-auto p-1 "><?= $ValideDoc['type_document'] ?></div>
                                    <div class="w-[20%] h-auto p-1 flex items-center ">
                                        <p class="bg-green-400 rounded-md px-3 text-white "><?= $ValideDoc['statut'] ?></p>
                                    </div>
                                    <div class="w-[15%] h-auto p-1 flex justify-around ">
                                        <a href="./profilUser.php?id=<?= $ValideDoc['id'] ?>" class="text-blue-500 hover:underline transition-[1s]">Profile</a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <div class="flex justify-center items-center text-lg text-[#00000071] pt-10">
                            <?php
                            if (isset($msgDocsValideVide)) {
                                echo $msgDocsValideVide;
                            }
                            ?>
                        </div>
                    </div>


                    <!-- tableau invalides 2-->
                    <div class="w-full h-full p-2 bg-white flex flex-col gap-4">

                        <div class="w-full h-auto px-2 flex flex-col justify-between items-center bg-white md:flex-row py-1">
                            <h1>Documents déjà expirés.</h1>

                            <a href="../models/deleteDoc.php?expire=invalide" onclick="return confirm('Supprimer tous les documents expirés ?')" class=" px-3 py-2 flex justify-center items-center text-sm font-medium rounded-sm bg-[whitesmoke] text-red-400">Supprimer les docs expirés</a>
                        </div>

                        <div class="w-full h-auto flex flex-col gap-1 text-sm">
                            <!-- head -->

                            <div class="border w-full h-auto flex font-medium rounded bg-[whitesmoke]">
                                <div class="w-[30%] h-auto p-1">N<sup>o</sup> du docmt</div>
                                <div class="w-[35%] h-auto p-1">Type-docmt</div>
                                <div class="w-[20%] h-auto p-1">Statut</div>
                                <div class="w-[15%] h-auto p-1">Actions</div>
                            </div>
                            <!-- tobody -->
                            <?php foreach ($ExpireDocs as $ExpireDoc): ?>
                                <div class="border w-full h-auto flex  rounded">
                                    <div class="w-[30%] h-auto p-1 "><?= $ExpireDoc['num_document'] ?></div>
                                    <div class="w-[35%] h-auto p-1 "><?= $ExpireDoc['type_document'] ?></div>
                                    <div class="w-[20%] h-auto p-1 flex items-center">
                                        <p class="bg-red-400 rounded-md px-3 text-white "><?= $ExpireDoc['statut'] ?></p>
                                    </div>
                                    <div class="w-[15%] h-auto p-1 flex justify-around ">
                                        <a href="./profilUser.php?id=<?= $ExpireDoc['id'] ?>" class="text-blue-500 hover:underline transition-[1s]">Profile</a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <div class="flex justify-center items-center text-lg text-[#00000071] pt-10">
                            <?php
                            if (isset($msgDocsExpireVide)) {
                                echo $msgDocsExpireVide;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>

    <?php
    require_once('./components/notification.php');

    ?>

    <!-- <script src="../js/lienSide.js"></script> -->
</body>

</html>