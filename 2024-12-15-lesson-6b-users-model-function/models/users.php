<?php


function check_user($name) {
    $vip_list = ["Tom", "John"];

    if (in_array($name, $vip_list)) {
        return true;
    }
    return false;
}