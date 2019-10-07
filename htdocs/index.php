<?php
require __DIR__ . '/../vendor/autoload.php';

$routes = [];

$routes['/'] = function () {
	$date = new DateTime();
	$message = $date->format("今はY年m月d日 H時i分s秒です");
	echo "<!DOCTYPE html>\n";
	echo "<title>test</title>\n";
	echo "<h1>現在は" . h(date('Y年m月d日H時i分s秒')) . "です</p>\n";
	echo "<ul><li><a href='/phpinfo.php'><code>phpinfo()</code></a></ul>\n";
	exit;
};

$routes['/phpinfo.php'] = function () {
	phpinfo();
};

if (isset($routes[$_SERVER['REQUEST_URI']])) {
	$f = $routes[$_SERVER['REQUEST_URI']];
	$f();
} else {
	// http_response_code(response_code:404);
	echo "<h1>404 Not Found</h1>";
}
