<?php
    session_start();

    include "models/users.php";

    $model = $_GET["model"] ?? "static";
    $action = $_GET["action"] ?? "page";
    $page = $_GET["page"] ?? "home";

    if ($model == "users") {
        if ($action == "login") {
            $page = "login";
        }
        if ($action == "dologin") {
            $name = $_POST["name"] ?? "";
            if (check_user($name)) {
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
    }


    // Note: When the "??" not working in old PHP, we need following code.
    // if (!isset($page)) {
    //     $page = "home";
    // }

    include "template.php";
