<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>LOGO</header>
    <nav>
        <ul>
            <li><a href="?page=home">Home</a></li>
            <li><a href="?page=about">About</a></li>
            <li><a href="?page=awards">Awards</a></li>
            <li><a href="?page=projects">Projects</a></li>
            <li><a href="?page=welcome">Login</a></li>
        </ul>
    </nav>

    <main>
        <?php include "pages/$page.php"; ?>
    </main>

    <footer>Footer</footer>
</body>
</html>