<?php foreach ($questions as $question): ?>
    <li>
        <h2><?php echo $question["question"] ?></h2>
        <details>
            <summary>Answers</summary>
            <?php echo $question["ans"] ?>
        </details>
        <p><?php echo $question["option_1"] ?></p>
        <p><?php echo $question["option_2"] ?></p>
        <p><?php echo $question["option_3"] ?></p>
        <p><?php echo $question["option_4"] ?></p>
    </li>
<?php endforeach; ?>