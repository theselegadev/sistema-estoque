<?php
    session_start();
    session_unset();
    session_destroy();

    header("Location: ./index.php?saiu=Você saiu do sistema");
?>