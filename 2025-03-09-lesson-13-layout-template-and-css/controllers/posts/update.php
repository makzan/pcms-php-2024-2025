<?php

require_once "models/post.php";

$id = $_POST["id"];
$title = $_POST["title"];
$content = $_POST["content"];

$result = update_post($id, $title, $content);

if (!$result) {
    die("Something went wrong");
}

header("Location: ?module=posts&action=show&id=$id");

