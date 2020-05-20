<?php

require_once  __DIR__ . "/vendor/autoload.php";

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $router) {
    $router->addRoute('GET', '/', 'HomeController');
    $router->addRoute('POST', '/shipping-rate', 'ShippingRateController');
});
// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $response = json_encode([
            'code'  => 1010,
            'status' => 'failed',
            'message' => 'page not found'
        ]);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        $response = json_encode([
            'code'  => 1020,
            'status' => 'failed',
            'message' => 'method not allowed'
        ]);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];
        $controllerPath = '\App\Controllers\\' . $handler;

        $controller = new $controllerPath;


        $response = json_encode($controller());


        break;
}

header('Content-type: application/json');

echo $response;