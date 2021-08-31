<?php

    include "./db/db.php";

    session_start();
    $_SESSION = array();

    session_destroy();
    header("Location: adminlogin.php");
    exit;

?>