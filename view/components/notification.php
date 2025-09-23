<!-- notification -->
<section id="notification" class="w-full h-screen bg-[#1c1c2cbe] absolute top-0 z-10 hidden justify-end items-center pointer-events-none backdrop-blur-0 transition-[1s] duration-300">
    <section class="w-full h-screen bg-indigo-500 text-white pt-4 flex flex-col justify-between gap-2 lg:w-[25%]">
        <div class="w-full h-auto flex flex-col gap-2 px-2 overflow-hidden">
            <div class="w-full h-auto flex justify-between items-center">
                <h1 class="text-2xl font-semibold ">Notifications <?= " (" . $rownotif . ")" ?></h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 36 36" class="removeNotification text-2xl cursor-pointer text-[whitesmoke]">
                    <path fill="currentColor" d="M18 2a16 16 0 1 0 16 16A16 16 0 0 0 18 2m8 22.1a1.4 1.4 0 0 1-2 2l-6-6l-6 6.02a1.4 1.4 0 1 1-2-2l6-6.04l-6.17-6.22a1.4 1.4 0 1 1 2-2L18 16.1l6.17-6.17a1.4 1.4 0 1 1 2 2L20 18.08Z" class="clr-i-solid clr-i-solid-path-1" />
                    <path fill="none" d="M0 0h36v36H0z" />
                </svg>
            </div>

            <!-- notifications -->
            <div id="scroll-notif" class="w-full h-auto py-2 flex flex-col gap-2 overflow-y-auto p-2">
                <div class="text-indigo-200 font-medium text-sm flex justify-center">
                    <?php
                    if (isset($msgnotifVide)) {
                        echo $msgnotifVide;
                    }

                    ?>
                </div>
                <!-- 1 -->
                <?php
                foreach ($notifications as $notification):

                ?>
                    <div class="border border-[#f5f5f546] w-full h-auto flex gap-2 p-2 shadow-md rounded bg-[whitesmoke]">
                        <div class="border border-indigo-300 w-12 h-12 flex justify-center items-center rounded-full text-[whitesmoke] bg-indigo-500 text-2xl">
                            <h1>NF</h1>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M14 14.252V22H4a8 8 0 0 1 10-7.748M12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6s6 2.685 6 6s-2.685 6-6 6m8 4h3v2h-3v3.5L15 18l5-4.5z"/></svg> -->
                        </div>
                        <div class="w-[85%] flex flex-col gap-1 relative text-black">
                            <h1 class="text-sm font-medium">
                                <?= $notification['num_document'] ?>
                            </h1>
                            <p class="text-sm">
                                <?= $notification['message'] ?>
                            </p>
                            <div class="text-xs w-full flex justify-between items-end gap-3 pt-1">
                                <p>
                                    <?= $notification['actions'] ?>
                                </p>
                                <p>
                                    <?= $notification['created_at'] ?>
                                </p>
                            </div>
                            <a href="../models/deletenotif.php?id=<?= $notification['id'] ?>" class="text-red-400 absolute top-0 right-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 28 28" class="text-[1.1rem]">
                                    <path fill="currentColor" d="M11.5 6h5a2.5 2.5 0 0 0-5 0M10 6a4 4 0 0 1 8 0h6.25a.75.75 0 0 1 0 1.5h-1.31l-1.217 14.603A4.25 4.25 0 0 1 17.488 26h-6.976a4.25 4.25 0 0 1-4.235-3.897L5.06 7.5H3.75a.75.75 0 0 1 0-1.5zm2.5 5.75a.75.75 0 0 0-1.5 0v8.5a.75.75 0 0 0 1.5 0zm3.75-.75a.75.75 0 0 0-.75.75v8.5a.75.75 0 0 0 1.5 0v-8.5a.75.75 0 0 0-.75-.75" />
                                </svg>
                            </a>
                        </div>
                    </div>

                <?php endforeach ?>
            </div>
        </div>

        <div class="w-full py-2 flex justify-center items-center bg-[whitesmoke] font-medium">
            <a href="../models/deletenotif.php?delete=supprimer" class="text-red-400 text-base">Supprimmer tout.</a>
        </div>
    </section>
</section>


<script src="../js/notification.js"></script>