<h1>Result: <?php echo number_format($score, 0) ?>%</h1>

<ul>
    <?php foreach ($question_results as $question_result): ?>
        <li>
            <p><?php echo $question_result["question"] ?></p>
            <p><?php echo $question_result["user_ans"] ?></p>
            <p><?php echo $question_result["result"] ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<a href="index.php?module=questions&action=exam">Take another exam</a>
