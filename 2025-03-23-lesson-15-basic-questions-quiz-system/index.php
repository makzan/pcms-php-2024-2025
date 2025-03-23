<?php

require_once "connect_db.php";

$module = $_GET["module"] ?? "questions"; // posts, static
$action = $_GET["action"] ?? "exam"; // CRUD // Read: index, show
$page = $_GET["page"] ?? "home"; // for static pages


include("controllers/$module/$action.php");
