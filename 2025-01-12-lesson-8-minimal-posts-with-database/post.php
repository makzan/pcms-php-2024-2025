<?php
// connect database localhost, root, password, myblog using pdo
$host = "localhost";
$username = "root";
$password = "root";
$database = "demo_blog";
$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

// select single post based on id
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<a href="index.php">Back</a>

<h1>
    <?php echo $post['title'] ?>
</h1>
<p>
    <?php echo $post['published_at'] ?>
</p>
<p>
    <?php echo $post['content'] ?>
</p>