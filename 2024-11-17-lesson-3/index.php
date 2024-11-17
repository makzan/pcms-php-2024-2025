<?php
    // Data
    $name = $_GET["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>PHP Demo</title>
</head>
<body>
    <?php if ($name == "Tom"): ?>

        <h1>[VIP] Welcome Tom!</h1>

    <?php else: ?>

        <h1>Hello <?php echo $name; ?>!</h1>
        <p>Please join our membership.</p>

    <?php endif; ?>

    <form action="index.php" method="get">
        What is your name?
        <input type="text" name="name">
        <input type="submit">
    </form>
</body>
</html>