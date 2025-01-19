<p>
    <a href="index.php"> Home </a>
</p>

<h1>
    <?php echo $post["title"] ?>
</h1>

<p>
    <?php echo $post["published_at"] ?>
</p>

<div>
    <?php echo str_replace("\n", "<br>", $post["content"]) ?>
</div>