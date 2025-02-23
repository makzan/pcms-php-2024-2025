<?php


function get_all_posts() {
    global $conn;
    $sql = "SELECT * FROM posts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

function get_post($id) {
    global $conn;
    $sql = "SELECT * FROM posts WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    return $post;
}

function get_comments_for_post($id) {
    global $conn;
    $sql = "SELECT * FROM comments WHERE post_id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}


// UPDATE posts SET title='New Title' WHERE posts.id=1
// DELETE FROM posts WHERE id=1