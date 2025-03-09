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

function insert_post($title, $content) {
    global $conn;
    $published_at = date("Y-m-d");
    $sql = "INSERT INTO posts
            (title, content, published_at,
            created_at, updated_at)
            VALUES
            ('$title', '$content', '$published_at',
            '$published_at', '$published_at'
            )";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

// UPDATE `posts` SET `title` = 'New title', `content` = 'New Content' WHERE `posts`.`id` = 8;
function update_post($id, $title, $content) {
    global $conn;
    $sql = "UPDATE posts SET title='$title', content='$content'
            WHERE id=$id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function delete_post($id) {
    global $conn;
    $sql = "DELETE FROM posts WHERE id=$id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}


// UPDATE posts SET title='New Title' WHERE posts.id=1
// DELETE FROM posts WHERE id=1