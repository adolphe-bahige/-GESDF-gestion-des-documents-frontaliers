<?php
require('../models/session.php');
// print_r($Authadmin);
require_once('../models/readAllDocuments.php');
include '../models/search.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Repertoire user(documents)</title>
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
                    <h1 class="text-lg font-semibold">Repertoire des documents enregistré</h1>
                    <form action="./repertoireUser.php" method="get" class="w-[35%] h-auto flex justify-start items-stretch relative">

                        <input type="search" name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" placeholder="Entrer le numero d'un document..." class="w-full h-[2rem] pl-[2.8rem] pr-1 rounded bg-transparent border outline-none">

                        <button type="submit" class="w-[2.5rem] h-[2rem] absolute rounded flex justify-center items-center bg-[whitesmoke] ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>

                    </form>
                    <a href="./addDocs.php" class="w-full h-[2.5rem] flex justify-center items-center text-base font-medium rounded bg-indigo-500 text-white md:w-[20%]">Ajouter un document</a>
                </div>

                <div class="w-full h-full p-2 bg-white flex flex-col gap-4">

                    <!-- tableau -->

                    <div class="w-full h-auto flex flex-col gap-1 text-sm">
                        <!-- head -->

                        <div class="border w-full h-auto flex font-medium rounded bg-[whitesmoke]">
                            <div class="w-[12%] h-auto p-1">N<sup>o</sup> du docmt</div>
                            <div class="w-[18%] h-auto p-1">Nom complet</div>
                            <div class="w-[11%] h-auto p-1">Nationalite</div>
                            <div class="w-[12%] h-auto p-1">Profession</div>
                            <div class="w-[10%] h-auto p-1">Type-docmt</div>
                            <div class="w-[6%] h-auto p-1">Statut</div>
                            <div class="w-[13%] h-auto p-1 ">Admin</div>
                            <div class="w-[18%] h-auto p-1">Actions</div>
                        </div>
                        <!-- tobody -->
                        <?php foreach ($documents as $key => $document): ?>
                            <div class="border w-full h-auto flex  rounded">
                                <div class="w-[12%] h-auto p-1"><?= $document['num_document'] ?></div>
                                <div class="w-[18%] h-auto p-1"><?= $document['doc_name'] ?></div>
                                <div class="w-[11%] h-auto p-1"><?= $document['nationality'] ?></div>
                                <div class="w-[12%] h-auto p-1"><?= $document['profession'] ?></div>
                                <div class="w-[10%] h-auto p-1"><?= $document['type_document'] ?></div>
                                <?php
                                if ($document['statut'] == 'valide') {
                                ?>
                                    <div class="w-[6%] h-auto p-1 flex items-center">
                                        <p class="bg-green-400 rounded-md px-3 text-white "><?= $document['statut'] ?></p>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="w-[6%] h-auto p-1 flex items-center">
                                        <p class="bg-red-400 rounded-md px-3 text-white "><?= $document['statut'] ?></p>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="w-[13%] h-auto px-2"><?= $document['admin_name'] ?></div>
                                <div class="w-[18%] h-auto p-1 flex justify-around">
                                    <a href="./profilUser.php?id=<?= $document['id'] ?>" class="text-blue-500 underline">Modifier</a>
                                    <!-- <a href="../models/deleteDoc.php?id=<?= $document['id'] ?>" class="text-red-500 font-medium underline">Supprimer</a> -->
                                    <a href="./addJourney.php?num_doc=<?= $document['num_document'] ?>" class="text-blue-500 underline">Entr/Sort</a>
                                    <a href="./profilUser.php?id=<?= $document['id'] ?>" class="text-blue-500 underline">Profile</a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <div class="flex justify-center items-center text-lg text-[#00000071] pt-[20vh]">
                        <?php
                        if (isset($msgDocsVide)) {
                            echo $msgDocsVide;
                        }
                        ?>
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