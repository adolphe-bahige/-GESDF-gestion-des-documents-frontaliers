<?php
require('../models/session.php');
// print_r($Authadmin);
require('../models/readAllDocuments.php');
require('../models/readJourney.php');
require('../models/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Dashboard</title>
</head>

<body>
    <main class="w-full h-auto ">
        <!-- navbar  -->
        <?php
        require('./components/navbar.php');
        ?>

        <!-- section1 sidebar et content -->
        <section class="w-full h-auto flex bg-[whitesmoke] relative">
            <!-- sidebar -->
            <?php
            require('./components/sidebar.php');
            ?>


            <!-- dashbord -->
            <section class="w-full min-h-[90vh] flex flex-col space-y-4 p-2 lg:w-[80%] lg:ml-auto">

                <div class="w-full h-auto px-2 flex items-center bg-white md:flex-row py-2">
                    <h1 class="text-lg font-semibold">Dashboard</h1>
                </div>

                <div class="w-full h-full p-2 bg-white flex flex-col gap-4">
                    <!-- total document, nationls,strangers,and entries/exits  -->
                    <div class="w-full h-auto pb-2 grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-4">

                        <!-- div1 total documents register  -->
                        <div class="border w-full py-4 rounded flex flex-col justify-center items-center gap-2 p-1">
                            <h1 class="text-base font-medium">Total documents enregistrés</h1>

                            <div class="flex items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-passport" viewBox="0 0 16 16">
                                    <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6M6 8a2 2 0 1 1 4 0 2 2 0 0 1-4 0m-.5 4a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                    <path d="M3.232 1.776A1.5 1.5 0 0 0 2 3.252v10.95c0 .445.191.838.49 1.11.367.422.908.688 1.51.688h8a2 2 0 0 0 2-2V4a2 2 0 0 0-1-1.732v-.47A1.5 1.5 0 0 0 11.232.321l-8 1.454ZM4 3h8a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1" />
                                </svg>

                                <p class="text-xl font-semibold">
                                    <?php
                                    if (isset($rowdoc)) {
                                        echo $rowdoc;
                                    }
                                    ?>
                                </p>
                            </div>

                        </div>

                        <!-- div3 nationls  -->
                        <div class="border w-full py-4 rounded flex flex-col justify-center items-center gap-2 p-1">
                            <h1 class="text-base font-medium">Nationaux</h1>

                            <div class="flex items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                </svg>

                                <p class="text-xl font-semibold">
                                    <?php
                                    if (isset($rownation)) {
                                        echo $rownation;
                                    }
                                    ?>
                                </p>
                            </div>

                        </div>

                        <!-- div4 stranges -->
                        <div class="border w-full py-4 rounded flex flex-col justify-center items-center gap-2 p-1">
                            <h1 class="text-base font-medium">Etrangers</h1>

                            <div class="flex items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                </svg>

                                <p class="text-xl font-semibold">
                                    <?php
                                    if (isset($nbetranger)) {
                                        echo $nbetranger;
                                    }
                                    ?>
                                </p>
                            </div>

                        </div>

                        <!-- div2 total entrer/sortie -->
                        <div class="border w-full py-4 rounded flex flex-col justify-center items-center gap-2 p-1">
                            <h1 class="text-base font-medium">Total Entrés/Sorties</h1>

                            <div class="flex items-center gap-4">
                                <!-- icone entrer -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                </svg>
                                <p class="text-2xl pb-2">||</p>
                                <!-- icone sortie -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                </svg>

                                <p class="text-xl font-semibold">
                                    <?php
                                    if (isset($rowjourney)) {
                                        echo $rowjourney;
                                    }
                                    ?>
                                </p>
                            </div>

                        </div>

                        <!-- div2 total docs valides -->
                        <div class="border w-full py-4 rounded flex flex-col justify-center items-center gap-2 p-1">
                            <h1 class="text-base font-medium">Total docs valides</h1>

                            <div class="flex items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-passport" viewBox="0 0 16 16">
                                    <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6M6 8a2 2 0 1 1 4 0 2 2 0 0 1-4 0m-.5 4a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                    <path d="M3.232 1.776A1.5 1.5 0 0 0 2 3.252v10.95c0 .445.191.838.49 1.11.367.422.908.688 1.51.688h8a2 2 0 0 0 2-2V4a2 2 0 0 0-1-1.732v-.47A1.5 1.5 0 0 0 11.232.321l-8 1.454ZM4 3h8a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1" />
                                </svg>

                                <p class="text-xl font-semibold">
                                    <?php
                                    if (isset($rowValide)) {
                                        echo $rowValide;
                                    }
                                    ?>
                                </p>
                            </div>

                        </div>

                        <!-- div2 total docs invalide(expire) -->
                        <div class="border w-full py-4rounded flex flex-col justify-center items-center gap-2 p-1">
                            <h1 class="text-base font-medium">Total docs invalide</h1>

                            <div class="flex items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-passport" viewBox="0 0 16 16">
                                    <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6M6 8a2 2 0 1 1 4 0 2 2 0 0 1-4 0m-.5 4a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                    <path d="M3.232 1.776A1.5 1.5 0 0 0 2 3.252v10.95c0 .445.191.838.49 1.11.367.422.908.688 1.51.688h8a2 2 0 0 0 2-2V4a2 2 0 0 0-1-1.732v-.47A1.5 1.5 0 0 0 11.232.321l-8 1.454ZM4 3h8a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1" />
                                </svg>

                                <p class="text-xl font-semibold">
                                    <?php
                                    if (isset($rowExpire)) {
                                        echo $rowExpire;
                                    }
                                    ?>
                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- Table of entries/exits for nationals and strangers -->
                    <div class="w-full h-auto py-1 grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <!-- table nationals -->
                        <div class="w-full h-auto gap-1 text-sm flex flex-col">
                            <h1 class="text-base font-medium py-2">* Les Entrés/Sorties des Nationaux</h1>
                            <!-- head -->
                            <div class="border w-full h-auto flex font-medium rounded bg-[whitesmoke]">
                                <div class="w-[14%] h-auto p-1">N<sup>o</sup></div>
                                <div class="w-[29%] h-auto p-1">N<sup>o</sup> du docmt</div>
                                <div class="w-[28%] h-auto p-1">Entrer / Sortie</div>
                                <div class="w-[29%] h-auto p-1">Nationalité</div>
                            </div>
                            <!-- tbody -->
                            <?php
                            foreach ($EntrerSortieNationaux as $key => $EntrerSortieNationau):

                            ?>
                                <div class="border w-full h-auto flex rounded">
                                    <div class="w-[14%] h-auto p-1"><?= $key + 1 ?></div>
                                    <div class="w-[29%] h-auto p-1"><?= $EntrerSortieNationau['num_document'] ?></div>
                                    <div class="w-[28%] h-auto p-1"><?= $EntrerSortieNationau['enter_sortie'] ?></div>
                                    <div class="w-[29%] h-auto p-1"><?= $EntrerSortieNationau['nationality'] ?></div>
                                </div>
                            <?php
                            endforeach;
                            ?>

                            <div class="flex justify-center items-center text-lg text-[#00000071] pt-12">
                                <?php
                                if (isset($msgESNationaux)) {
                                    echo $msgESNationaux;
                                }
                                ?>
                            </div>
                        </div>


                        <!-- table strangers -->
                        <div class="w-full h-auto gap-1 text-sm flex flex-col">
                            <h1 class="text-base font-medium py-2">* Les Entrés/Sorties des Etrangers</h1>
                            <!-- head -->
                            <div class="border w-full h-auto flex font-medium rounded bg-[whitesmoke]">
                                <div class="w-[14%] h-auto p-1">N<sup>o</sup></div>
                                <div class="w-[29%] h-auto p-1">N<sup>o</sup> du docmt</div>
                                <div class="w-[28%] h-auto p-1">Entrer / Sortie</div>
                                <div class="w-[29%] h-auto p-1">Nationalité</div>
                            </div>
                            <!-- tbody -->
                            <?php
                            foreach ($EntrerSortieEntrangers as $key => $EntrerSortieEntranger):

                            ?>
                                <div class="border w-full h-auto flex rounded">
                                    <div class="w-[14%] h-auto p-1"><?= $key + 1 ?></div>
                                    <div class="w-[29%] h-auto p-1"><?= $EntrerSortieEntranger['num_document'] ?></div>
                                    <div class="w-[28%] h-auto p-1"><?= $EntrerSortieEntranger['enter_sortie'] ?></div>
                                    <div class="w-[29%] h-auto p-1"><?= $EntrerSortieEntranger['nationality'] ?></div>
                                </div>

                            <?php
                            endforeach;
                            ?>

                            <div class="flex justify-center items-center text-lg text-[#00000071] pt-12">
                                <?php
                                if (isset($msgESEtrangers)) {
                                    echo $msgESEtrangers;
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

        </section>

        </section>
    </main>

    <?php
    require_once('./components/notification.php');

    ?>


</body>

</html>