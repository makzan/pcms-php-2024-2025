<?php

require_once "connect_db.php";

include_once("models/note.php");

$module = $_GET["module"] ?? "notes";
$action = $_GET["action"] ?? "index";


include("controllers/$module/$action.php");
