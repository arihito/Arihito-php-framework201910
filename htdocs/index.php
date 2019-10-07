<?php
require __DIR__ . '/../vendor/autoload.php';

// routes.phpで返されたViewルートを取得
$routes = require __DIR__ . '/../app/routes.php';

// ？以降のGETパラメータを読み込めるように変換処理
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// もしURLにパラメータがあればコールバック関数を実行する
if (isset($routes[$_SERVER['REQUEST_URI']])) {
	$f = $routes[$request_uri];
	[$status, $headers, $body] = $f();
	http_response_code($status);
	foreach ($headers as $name => $h) {
		header("{$name}: {$h}");
	}
	echo $body;

} else {

// 適切なパラメータでなければエラー
	http_response_code(404);
	echo "<h1>404 Not Found</h1>";
}
