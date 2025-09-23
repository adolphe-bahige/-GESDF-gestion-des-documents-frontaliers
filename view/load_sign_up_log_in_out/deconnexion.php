<?php
    session_start();
    session_destroy();
    header("location: ../load_sign_up_log_in_out/logAdmin.php");

?>