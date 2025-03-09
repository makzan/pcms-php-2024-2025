<?php


function insert_comment($post_id, $author, $content) {
    global $conn;
    $published_at = date("Y-m-d");
    $sql = "INSERT INTO comments
            (post_id, author, content, published_at)
            VALUES
            ($post_id, '$author', '$content', '$published_at')";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}