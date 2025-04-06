<?php

// notes table
// id int
// title varchar(255)
// content longtext
// attachment_path varchar(255)
// created_at date

function get_all_notes() {
    global $conn;
    $sql = "SELECT * FROM notes ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $notes;
}

function create_note($title, $content, $attachment_path="") {
    global $conn;
    $sql = "INSERT INTO notes (title, content, attachment_path, created_at) VALUES (:title, :content, :attachment_path, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("title", $title);
    $stmt->bindParam("content", $content);
    $stmt->bindParam("attachment_path", $attachment_path);
    $stmt->execute();
    return $conn->lastInsertId();
}
