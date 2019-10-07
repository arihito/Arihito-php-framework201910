<?php
require __DIR__ . '/../vendor/autoload.php';

// routes.phpで返されたViewルートを取得
$routes = require __DIR__ . '/../app/routes.php';

// ？以降のGETパラメータを読み込めるように変換処理
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 適切なパラメータが無い場合のエラー処理
$not_found = function () {
	return [404, ['Content-Type'=>'text/html'], "<h1>404 Not Found</h1>"];
};

// もしURLにパラメータがあればコールバック関数を実行する
// そうでなければエラーを表示
$f = $routes[$request_uri] ?? $not_found;
[$status, $headers, $body] = $f();
http_response_code($status);
foreach ($headers as $name => $h) {
	header("{$name}: {$h}");
}
echo $body;
