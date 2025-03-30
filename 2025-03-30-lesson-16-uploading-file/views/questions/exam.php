<form action="index.php?module=questions&action=exam_result" method="POST">
<?php foreach ($questions as $question): ?>
    <li>
        <h2><?php echo $question["question"] ?></h2>
        <p>
            <input type="radio" name="q<?php echo $question["id"] ?>" value="<?php echo $question["option_1"] ?>">
            <?php echo $question["option_1"] ?>
        </p>
        <p>
            <input type="radio" name="q<?php echo $question["id"] ?>" value="<?php echo $question["option_2"] ?>">
            <?php echo $question["option_2"] ?>
        </p>
        <p>
            <input type="radio" name="q<?php echo $question["id"] ?>" value="<?php echo $question["option_3"] ?>">
            <?php echo $question["option_3"] ?>
        </p>
        <p>
            <input type="radio" name="q<?php echo $question["id"] ?>" value="<?php echo $question["option_4"] ?>">
            <?php echo $question["option_4"] ?>
        </p>
    </li>
<?php endforeach; ?>

<input type="submit" value="交卷">


</form>