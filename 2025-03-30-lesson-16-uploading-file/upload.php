<pre>
<?php
    var_dump($_POST);

    var_dump($_FILES);

    move_uploaded_file(
        $_FILES["testFile"]["tmp_name"],
        "uploads/" . $_FILES["testFile"]["name"]
    );


?>