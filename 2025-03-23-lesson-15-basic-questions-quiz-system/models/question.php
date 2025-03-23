<?php


function get_all_questions() {
    global $conn;
    $sql = "SELECT * FROM questions";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $questions;
}

function get_question($id) {
    global $conn;
    $sql = "SELECT * FROM questions WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    return $question;
}

function insert_question($question, $option_1, $option_2, $option_3, $option_4, $ans) {
    global $conn;
    $sql = "INSERT INTO questions
            (question, option_1, option_2, option_3, option_4, ans)
            VALUES
            ('$question', '$option_1', '$option_2', '$option_3', '$option_4', '$ans')";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

// UPDATE `posts` SET `title` = 'New title', `content` = 'New Content' WHERE `posts`.`id` = 8;
function update_question($id, $question, $option_1, $option_2, $option_3, $option_4, $ans) {
    global $conn;
    $sql = "UPDATE questions SET question='$question', option_1='$option_1', option_2='$option_2', option_3='$option_3', option_4='$option_4', ans='$ans'
            WHERE id=$id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function delete_question($id) {
    global $conn;
    $sql = "DELETE FROM questions WHERE id=$id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}


// UPDATE posts SET title='New Title' WHERE posts.id=1
// DELETE FROM posts WHERE id=1