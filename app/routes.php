<?php
// ①ルーティング
// $routesにクエリ文字の連想配列内に
// コールバック関数でViewへのアドレスを読み込んでいる。
$routes = [];
$template = new \Arihito\TemplateFactory(__DIR__ . '/view/');

// 文字列を返す規則立てたルーティング
$routes['/'] = function () use ($template) {
	// 一気に返す
	return [200, ['Content-Type' => 'text/html'], $template->create('index', [
		'title' => 'アリヒトさんのホームページのindex',
    'name' => 'アリンコさん'
	])];
};

$routes['/phpinfo.php'] = function () {
	ob_start();
	phpinfo();
};

return $routes;
