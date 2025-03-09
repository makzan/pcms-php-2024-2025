<?php

include_once "models/post.php";

$id = $_GET['id'];
delete_post($id);

header("Location: ?module=posts&action=index");