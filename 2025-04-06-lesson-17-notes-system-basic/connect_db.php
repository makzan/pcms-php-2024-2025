<?php

// connect database localhost, root, password, myblog using pdo
$host = "localhost";
$username = "root";
$password = "root";
$database = "ai_note_system";
$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);