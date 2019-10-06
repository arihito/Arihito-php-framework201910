<?php
require __DIR__ . '/../vendor/autoload.php';

$date = new DateTime();
$message = $date->format("今はY年m月d日 H時i分s秒です");
echo "<h1>" . h($message) . "</h1>";
