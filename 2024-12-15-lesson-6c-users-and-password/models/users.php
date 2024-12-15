<?php


function check_user($name, $password) {
    $accounts = [
        "Tom" => "123456",
        "John" => "987654",
    ];

    if (isset($accounts[$name]) &&
        $accounts[$name] == $password) {
        // Please note that in production (real world)
        // 1. We don't store password in plain text
        // 2. We don't store plain password anywhere
        // 3. We don't compare password by ==

        return true;
    }
    return false;
}