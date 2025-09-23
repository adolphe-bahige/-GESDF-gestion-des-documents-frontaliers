<?php
require('../models/session.php');
// print_r($Authadmin);
require('../models/modelUpdateJourney.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>modifier un entré/sortie</title>
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

                <div class="w-full h-auto px-6 flex flex-col justify-between items-center bg-white md:flex-row py-1">
                    <h1 class="text-lg font-semibold">Modifier un entré/sortie</h1>

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
                    </span>
                </div>

                <div class="w-full h-full p-4 bg-white">

                    <form action="" method="post" class="w-full h-auto">
                        <div class="w-full h-auto flex flex-col gap-4 py-2 rounded md:w-[60%] md:border md:px-4 lg:w-[50%]">
                            <!-- informations of journey -->
                            <h2 class="text-lg font-medium">Informations du voyage</h2>
                            <div class="w-full h-auto flex flex-col gap-4 md:gap-3">

                                <div class="w-full h-auto flex flex-col gap-1">
                                    <!-- le Numero du document selectionner -->
                                    <p class="text-sm font-medium">Numero du document</p>
                                    <input type="text" name="num-doc" id="num-doc" value="<?= $journey['num_document'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                </div>

                                <div class="w-full h-auto flex flex-col gap-1">
                                    <!-- le Numero du document selectionner -->
                                    <p class="text-sm font-medium">Entrer/sortie</p>
                                    <input type="text" name="entrer-sortie" id="entrer-sortie" value="<?= $journey['enter_sortie'] ?>" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                </div>

                                <div class="w-full h-auto flex flex-col gap-1">
                                    <p class="text-sm font-medium">Lieu de destionation</p>
                                    <input type="text" name="lieu-dest" id="lieu-dest" value="<?= $journey['lieu_dest'] ?>" placeholder="Ex: Bukavu / Goma / Ngagara" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                </div>

                                <div class="w-full h-auto flex flex-col gap-1">
                                    <p class="text-sm font-medium">Motif de voyage</p>
                                    <input type="text" name="motif" id="motif" value="<?= $journey['motif'] ?>" placeholder="EX: Etude / Soin de santé / Business" class="border w-[100%] py-2 pl-3 pr-8 text-sm font-semibold rounded outline-none md:py-1">
                                </div>

                            </div>

                            <div class="w-full flex items-center md:w-[60%]">
                                <button type="submit" name="submit" class="px-12 py-2 text-base font-medium rounded bg-indigo-500 text-white ">Modifier</button>
                            </div>
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