<?php
require __DIR__ . '/../vendor/autoload.php';

$date = new DateTime();
$message = $date->format("今はY年m月d日 H時i分s秒です");
echo "<!DOCTYPE html>\n";
echo "<title>test</title>\n";
echo "<h1>現在は" . h(date('Y年m月d日H時i分s秒')) . "です</p>\n";
echo "<ul><li><a href='/phpinfo.php'><code>phpinfo()</code></a></ul>\n";
