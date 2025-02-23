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

<h2>Comments</h2>

<?php if (count($comments) == 0): ?>
    <p>No comments yet.</p>
<?php endif; ?>

<ul>
    <?php foreach ($comments as $comment): ?>
        <li>
            <p><?php echo $comment["author"] ?> said on <?php echo $comment["published_at"] ?>:</p>
            <?php echo $comment["content"] ?>
        </li>
    <?php endforeach; ?>
</ul>

<a href="?module=posts&action=edit&id=<?php echo $post["id"] ?>">Edit post</a>

<h2>Leave a comment</h2>

<form action="index.php?module=comments&action=create" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $post["id"] ?>">
    <div>
        <label for="author">What is your name?</label><br>
        <input type="text" id="author" name="author">
    </div>
    <div>
        <label for="content">Comment content</label><br>
        <textarea id="content" name="content"></textarea>
    </div>
    <button type="submit">Submit</button>
</form>
