<?php

$title = $_POST["title"];
$content = $_POST["content"];
$attachment_path = "";

if (isset($_FILES["attachment"])) {
    $attachment = $_FILES["attachment"];
    $attachment_path = "uploads/" . $attachment["name"];
    move_uploaded_file($attachment["tmp_name"], $attachment_path);
}


create_note($title, $content, $attachment_path);

// redirect back to index.
header("Location: index.php?module=notes&action=index");

