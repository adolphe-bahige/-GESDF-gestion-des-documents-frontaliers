<?php
require('../models/session.php');
// print_r($Authadmin);
require('../models/readJourney.php');
include '../models/search.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Repertoire des voyages</title>
</head>

<body>
    <main class="w-full h-auto ">
        <!-- sidebar -->
        <!-- navbar -->
        <?php
        require('./components/navbar.php');
        ?>

        <!-- section1 -->
        <div class="w-full h-auto flex bg-[whitesmoke] relative">
            <!-- navbar -->
            <?php
            require('./components/sidebar.php');
            ?>

            <!-- dashbord -->
            <section class="w-full min-h-[90vh] flex flex-col space-y-4 p-2 lg:w-[80%] lg:ml-auto">

                <div class="w-full h-auto px-2 py-1 flex flex-col justify-between items-center space-y-1 bg-white md:flex-row md:space-y-0">
                    <h1 class="text-lg font-semibold">Repertoire des voyages entrés/sorties</h1>

                    <a href="./addJourney.php" class="w-full h-[2.5rem] flex justify-center items-center text-base font-medium rounded bg-indigo-500 text-white md:w-[20%]">Ajouter un entré/sortie</a>
                </div>

                <div class="w-full h-full p-2 bg-white">
                    <!-- tableau -->
                    <div class="w-full h-auto flex flex-col gap-1 text-sm">
                        <!-- head -->
                        <div class="border w-full h-auto flex font-medium rounded bg-[whitesmoke]">
                            <div class="w-[7%] h-auto p-1">N<sup>o</sup></div>
                            <div class="w-[16%] h-auto p-1">N<sup>o</sup> du docmt</div>
                            <div class="w-[15%] h-auto p-1">Entrer/Sortie</div>
                            <div class="w-[17%] h-auto p-1">Lieu de destination</div>
                            <div class="w-[16%] h-auto p-1">Motif de voyage</div>
                            <div class="w-[16%] h-auto p-1">Date d'entrer/sortie</div>
                            <div class="w-[13%] h-auto p-1 flex justify-around">Actions</div>
                        </div>
                        <!-- tobody -->
                        <?php
                        foreach ($journeys as $key => $journey):
                        ?>
                            <div class="border w-full h-auto flex  rounded">
                                <div class="w-[7%] h-auto p-1"><?= $key + 1 ?></div>
                                <div class="w-[16%] h-auto p-1"><?= $journey['num_document'] ?></div>
                                <div class="w-[15%] h-auto p-1"><?= $journey['enter_sortie'] ?></div>
                                <div class="w-[17%] h-auto p-1"><?= $journey['lieu_dest'] ?></div>
                                <div class="w-[16%] h-auto p-1"><?= $journey['motif'] ?></div>
                                <div class="w-[16%] h-auto p-1"><?= $journey['created_at'] ?></div>
                                <div class="w-[13%] h-auto p-1 flex justify-around">
                                    <a href="./updateJourney.php?id=<?= $journey['id'] ?>" class="text-blue-500 font-medium underline">Modifier</a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <div class="flex justify-center items-center text-lg text-[#00000071] pt-[20vh]">
                        <?php
                        if (isset($msgjourneyVide)) {
                            echo $msgjourneyVide;
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

</body>

</html>