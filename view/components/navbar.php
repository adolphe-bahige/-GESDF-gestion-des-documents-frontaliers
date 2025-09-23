<?php
require_once('../models/modelNotification.php');
?>
<!-- navbar -->
<nav class="w-full h-[10vh] flex justify-between items-center gap-5 px-2 sticky top-0 bg-indigo-500 z-10 md:px-5">
    <!-- logo  -->
    <h1 class="text-2xl font-semibold text-white">GESPF BURUNDI</h1>

    <!-- notification et profile -->
    <div class="w-auto h-auto flex justify-between items-center gap-6">
        <!-- notification -->
        <div id="iconNotif" class="w-auto h-12 flex justify-center items-center relative cursor-pointer transition-[1s] hover:rotate-12 ">
            <svg xmlns="http://www.w3.org/2000/svg" width="2.2rem" height="2.2rem" fill="currentColor" class="bi bi-bell-fill text-white" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
            </svg>
            <!-- lorsque rouwCount sera superieur a zero le point rouge s'affichera sinon rien -->
            <span class="w-3 h-3 z-10 flex justify-center items-center absolute top-2 right-1 rounded-full">
                <?php
                if ($rownotif > 0) {
                    echo  '<p class="w-full h-full bg-red-400 rounded-full"></p> ';
                }
                ?>

            </span>
        </div>

        <!-- profile -->
        <a href="./adminProfil.php" class="admin hidden items-center justify-center h-auto cursor-pointer md:flex">
            <div class="border border-[#0000006e] w-12 h-12 overflow-hidden rounded-full">
                <img src="../imageUser/<?= $Authadmin['photo'] ?>" alt="profil" class="w-full h-full object-left">
            </div>
        </a>

        <span id="nav-list">
            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 20 20" class="bi-list cursor-pointer lg:hidden text-white">
                <path fill="currentColor" d="M2 4.75A.75.75 0 0 1 2.75 4h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75m0 10a.75.75 0 0 1 .75-.75h9.5a.75.75 0 0 1 0 1.5h-9.5a.75.75 0 0 1-.75-.75M2.75 9a.75.75 0 0 0 0 1.5h14.5a.75.75 0 0 0 0-1.5z" />
            </svg>
        </span>
    </div>

</nav>