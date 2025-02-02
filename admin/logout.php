<?php
    session_start();
    session_destroy();

    header("location:../login_aplikasia.php?pesan=logout");
?>
