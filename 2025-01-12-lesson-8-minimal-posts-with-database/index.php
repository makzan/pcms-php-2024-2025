<?php

// connect database localhost, root, password, myblog using pdo
$host = "localhost";
$username = "root";
$password = "root";
$database = "demo_blog";
$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

// select all posts
$sql = "SELECT * FROM posts";
$stmt = $conn->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// list all posts
?>
<ul>
    <?php foreach ($posts as $post) : ?>
        <li>
            <a href="post.php?id=<?php echo $post['id'] ?>">
                <?php echo $post['published_at']; ?>
                <?php echo $post['title'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>