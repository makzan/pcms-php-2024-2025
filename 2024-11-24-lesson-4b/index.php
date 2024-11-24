<?php
    $page = $_GET["page"] ?? "home";

    // Note: When the "??" not working in old PHP, we need following code.
    // if (!isset($page)) {
    //     $page = "home";
    // }

    include "template.php";
