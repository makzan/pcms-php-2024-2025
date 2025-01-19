<?php

include_once "models/post.php";

$posts = get_all_posts();

// include("views/posts/index.php");
include("views/$module/$action.php");


