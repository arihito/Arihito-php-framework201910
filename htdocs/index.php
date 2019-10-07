<?php
require __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/../app/routes.php';

if (isset($routes[$_SERVER['REQUEST_URI']])) {
	$f = $routes[$_SERVER['REQUEST_URI']];
	$f();
} else {
	// http_response_code(response_code:404);
	echo "<h1>404 Not Found</h1>";
}
