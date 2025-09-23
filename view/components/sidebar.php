<!-- sidebar -->
<div class="w-full h-screen bg-indigo-500 text-[whitesmoke] hidden lg:w-[20%] lg:h-[90vh] lg:flex lg:flex-col lg:justify-between lg:pb-6 lg:fixed ">
    <ul class="w-full flex flex-col gap-[.09rem] font-medium text-sm">

        <li class="w-full h-auto transition-[1s] pl-4">
            <a href="./dashboard.php" id="lien" class="w-full flex gap-4 py-2 hover:bg-[whitesmoke] hover:text-black transition-[1s] rounded-l-full pl-3 hover:pl-5 ">
                Dashboard of system
            </a>
        </li>

        <li class="w-full h-auto transition-[1s] pl-4">
            <a href="./addDocs.php" id="lien" class="w-full flex gap-4 py-2 hover:bg-[whitesmoke] hover:text-black transition-[1s] rounded-l-full pl-3 hover:pl-5 ">
                Add user document
            </a>
        </li>

        <li class="w-full h-auto transition-[1s] pl-4">
            <a href="./repertoireUser.php" id="lien" class="w-full flex gap-4 py-2 hover:bg-[whitesmoke] hover:text-black transition-[1s] rounded-l-full pl-3 hover:pl-5 ">
                Repertory of all documents
            </a>
        </li>

        <li class="w-full h-auto transition-[1s] pl-4">
            <a href="./historiqueDocs.php" id="lien" class="w-full flex gap-4 py-2 hover:bg-[whitesmoke] hover:text-black transition-[1s] rounded-l-full pl-3 hover:pl-5 ">
                Historique of documents
            </a>
        </li>

        <li class="w-full h-auto transition-[1s] pl-4">
            <a href="./addJourney.php" id="lien" class="w-full flex gap-4 py-2 hover:bg-[whitesmoke] hover:text-black transition-[1s] rounded-l-full pl-3 hover:pl-5 ">
                Add journey input/output
            </a>
        </li>

        <li class="w-full h-auto transition-[1s] pl-4">
            <a href="./repertoireJourney.php" id="lien" class="w-full flex gap-4 py-2 hover:bg-[whitesmoke] hover:text-black transition-[1s] rounded-l-full pl-3 hover:pl-5 ">
                Repertory of journey in/out
            </a>
        </li>

        <li class="w-full h-auto transition-[1s] pl-4">
            <a href="./profilUser.php" id="lien" class="w-full flex gap-4 py-2 hover:bg-[whitesmoke] hover:text-black transition-[1s] rounded-l-full pl-3 hover:pl-5 ">
                Profil user document selected
            </a>
        </li>

        <li class="w-full h-auto transition-[1s] pl-4">
            <a href="./adminProfil.php" id="lien" class="w-full flex gap-4 py-2 hover:bg-[whitesmoke] hover:text-black transition-[1s] rounded-l-full pl-3 hover:pl-5 ">
                Profil GESPF
            </a>
        </li>

    </ul>

    <div class="font-semibold w-full h-auto flex flex-col justify-center items-start text-sm gap-2 px-4 ">
        <p>Bienvenu, <?= $Authadmin['name'] ?>.</p>
        <hr class="w-full bg-white">

        <a href="./load_sign_up_log_in_out/deconnexion.php" class="flex items-center gap-1 text-sm transition-[1s] hover:translate-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 16 16">
                <path fill="currentColor" d="M3 15.93c-.23 0-.45-.08-.64-.23l-2-1.67a.99.99 0 0 1-.36-.76V2.73c0-.3.13-.58.36-.77l2-1.67c.3-.24.71-.29 1.06-.13a1 1 0 0 1 .58.91v13.87a1 1 0 0 1-.58.91c-.13.05-.28.08-.42.08M12 11V5c0-.45.54-.67.85-.35L15.5 7.3c.39.39.39 1.02 0 1.41l-2.65 2.65A.5.5 0 0 1 12 11" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" d="M3.5 2.5H9c.28 0 .5.22.5.5v2.5m-6 8H9c.28 0 .5-.22.5-.5v-2.5M15 8H7" stroke-width="1" />
            </svg>
            Logout
        </a>
    </div>

</div>

<script src="../js/lienSide.js"></script>