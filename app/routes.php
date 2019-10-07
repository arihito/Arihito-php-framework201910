<?php
// ①ルーティング
// $routesにクエリ文字の連想配列内に
// コールバック関数でViewへのアドレスを読み込んでいる。
$routes = [];

// 文字列を返す規則立てたルーティング
$routes['/'] = function () {
	ob_start();	// html出力をバッファに貯める
	include __DIR__ . '/../app/view/index.phtml';
	// 一気に返す
	return [200, ['Content-Type' => 'text/html'], ob_get_clean()];
};

$routes['/phpinfo.php'] = function () {
	ob_start();
	phpinfo();
};

return $routes;
