<?php
session_start();
$_SESSION["welcome"] = "Welcome to the website!";

$base_url = "http://localhost/blog-site-app";
$message = "";



try {
    $dbh = new PDO('mysql:host=localhost;dbname=blogsite_db', "root", "");
} catch (PDOException $e) {
    die("Connection Error : " . $e->getMessage());
}

