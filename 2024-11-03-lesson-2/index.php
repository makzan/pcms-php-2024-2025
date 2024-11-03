<?php
    $name = $_GET["name"];
    echo "Hello $name!";
?>
<form action="index.php" method="get">
    What is your name?
    <input type="text" name="name">
    <input type="submit">
</form>