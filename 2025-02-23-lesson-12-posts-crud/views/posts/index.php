<h1>Listing all posts</h1>

<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="<?php echo "?action=show&id={$post["id"]}" ?>">
                <?php echo $post["title"] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>