<?php

$view_data = [];

$notes = get_all_notes();
$view_data["notes"] = $notes;

include("views/layout.php");
