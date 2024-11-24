<?php

    $page = $_GET["page"] ?? "home";
    $action = $_GET["action"] ?? "page";

    if ($action == "login") {
        $name = $_POST["name"] ?? "";
        if ($name == "Tom") {
            $page = "member";
        } else {
            $page = "non-member";
        }
    }


    // Note: When the "??" not working in old PHP, we need following code.
    // if (!isset($page)) {
    //     $page = "home";
    // }

    include "template.php";
