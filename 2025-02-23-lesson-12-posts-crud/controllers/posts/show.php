<?php

include_once "models/post.php";

$id = $_GET['id'];
$post = get_post($id);
$comments = get_comments_for_post($id);

// include("views/posts/index.php");
include("views/$module/$action.php");


