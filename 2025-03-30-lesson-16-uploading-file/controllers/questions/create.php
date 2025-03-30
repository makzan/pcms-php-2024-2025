<?php

require_once "models/question.php";

$question = $_POST["question"];
$answer = $_POST["answer"];
$option_1 = $_POST["option_1"];
$option_2 = $_POST["option_2"];
$option_3 = $_POST["option_3"];
$option_4 = $_POST["option_4"];

// Handle file upload

var_dump($_FILES);

// TODO: handle duplicate file names by insert question-id or question text into file name
move_uploaded_file(
    $_FILES["question_image"]["tmp_name"],
    "uploads/" . $_FILES["question_image"]["name"]
);

$question_image = $_FILES["question_image"]["name"];


// Insert INTO DB

$result = insert_question($question, $option_1, $option_2, $option_3, $option_4, $answer, $question_image);

if (!$result) {
    die("Something went wrong");
}

header("Location: ?module=questions&action=index");

