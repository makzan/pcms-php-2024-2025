<h1>Notes</h1>

<div class="notes">
    <?php foreach($view_data["notes"] as $note): ?>
        <div class="note">
            <h2><?php echo $note["title"]; ?></h2>
            <p><?php echo $note["content"]; ?></p>
            <?php if ($note["attachment_path"]) { ?>
                <img src="<?php echo $note["attachment_path"]; ?>" alt="Attachment">
                <p><a href="<?php echo $note["attachment_path"]; ?>">Download attachment</a></p>
            <?php } ?>
            <p><?php echo $note["created_at"]; ?></p>
        </div>
    <?php endforeach ?>
</div>