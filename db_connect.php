<?php
    mysqli_report(MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_init();
    if (!$mysqli) {
        die('mysqli_init failed');
    }
    if (!$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 1)) {
        die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
    }

    try {
        if (!$mysqli->real_connect("192.168.0.105", "Recettes", "miammiam", "projet_recette")) {
            $mysqli->real_connect("localhost", "root", "", "projet_recette");
        }
    }
    catch(Exception $e) {
        $mysqli->real_connect("localhost", "root", "", "projet_recette");
    }
    $mysqli->set_charset('utf8');
?>