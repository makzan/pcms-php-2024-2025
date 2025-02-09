<?php

require_once "models/comment.php";

$post_id = $_POST["post_id"];
$author = $_POST["author"];
$content = $_POST["content"];

$result = insert_comment($post_id, $author, $content);

if (!$result) {
    die("Something went wrong");
}

header("Location: ?module=posts&action=show&id=$post_id");

