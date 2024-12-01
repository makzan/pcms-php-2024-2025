<?php
    session_start();

    $page = $_GET["page"] ?? "home";
    $action = $_GET["action"] ?? "page";

    if ($action == "login") {
        $name = $_POST["name"] ?? "";
        if ($name == "Tom") {
            $_SESSION["name"] = $name;
            $page = "member";
        } else {
            $page = "non-member";
        }
    }

    if ($action == "logout") {
        session_destroy();
        $page = "home";
    }


    // Note: When the "??" not working in old PHP, we need following code.
    // if (!isset($page)) {
    //     $page = "home";
    // }

    include "template.php";
