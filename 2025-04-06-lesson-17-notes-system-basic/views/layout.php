<style>
    img {max-width: 100%;
    }

    h2 {
        margin: 0;
    }

    .notes {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 10px;
    }
    .note {
        border: 1px solid #ccc;
        padding: 5px 10px;
        border-radius: 5px;
    }
</style>

<p>AI Notes System</p>

<form action="index.php?module=notes&action=create" method="post" enctype="multipart/form-data">
    <div>
        <input type="text" name="title" placeholder="Title">
    </div>
    <div>
        <textarea name="content" placeholder="Content"></textarea>
    </div>
    <div>
        <input type="file" name="attachment">
    </div>
    <input type="submit" value="Create">
</form>

<?php include("views/$module/$action.php"); ?>