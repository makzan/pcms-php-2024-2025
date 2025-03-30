<?php
    include_once "models/question.php";

    $questions = get_all_questions();

    $correct_count = 0;

    $question_results = [];

    foreach ($questions as $question) {
        $ans = $question["ans"];
        $user_ans = $_POST["q" . $question["id"]];
        if ($ans == $user_ans) {
            $correct_count++;
            $question_results[] = [
                "question" => $question["question"],
                "ans" => $ans,
                "user_ans" => $user_ans,
                "result" => "Correct"
            ];
        } else {
            $question_results[] = [
                "question" => $question["question"],
                "ans" => $ans,
                "user_ans" => $user_ans,
                "result" => "Wrong"
            ];
        }
    }

    $score = ($correct_count / count($questions)) * 100;

    include("views/layout.php");