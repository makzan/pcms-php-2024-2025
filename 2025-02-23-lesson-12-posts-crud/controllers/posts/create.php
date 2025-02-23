<?php

require_once "models/post.php";

$title = $_POST["title"];
$content = $_POST["content"];

$result = insert_post($title, $content);

if (!$result) {
    die("Something went wrong");
}

header("Location: ?module=posts&action=index");

