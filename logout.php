<?php

    session_start();

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])&& !isset($_SESSION["super"])){
        header("Location: login.php");
    }elseif(isset($_SESSION["user"])){
        header("Location: home.php");
    }elseif(isset($_SESSION["adm"])){
        header("Location: dashboard.php");
    }elseif(isset($_SESSION["super"])){
        header("Location: superAdm.php");
    }

    if(isset($_GET["logout"])){
        unset($_SESSION["user"]);
        unset($_SESSION["adm"]);
        unset($_SESSION["superAdm"]);

        session_unset();
        session_destroy();
        session_destroy();

        header("Location: login.php");
    }