<h1>Edit Post</h1>

<form action="/?module=posts&action=update" method="POST">
    <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
    <div>
        <label>
            Title
            <input type="text" name="title" value="<?php echo $post["title"] ?>">
        </label>
    </div>

    <div>
        <label>
            Content
            <textarea name="content">
                <?php echo $post["content"] ?>
            </textarea>
        </label>
    </div>

    <button type="submit">Update

</form>