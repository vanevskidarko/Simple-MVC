<?php

namespace mvc;

// Create routes
$routes = [
    '/' => ['controller' => 'HomeController', 'method' => 'index'],
    '/about' => ['controller' => 'AboutController', 'method' => 'index'],
    '/user/view/(\d+)' => ['controller' => 'UserController', 'method' => 'viewAction'],
    '/user/edit/(\d+)' => ['controller' => 'UserController', 'method' => 'editAction'],
    // Add more routes as needed
];

// Initialize router
$router = new Router();
foreach ($routes as $path => $routeConfig) {
    $controllerClass = 'mvc\\' . $routeConfig['controller'];
    $controller = new $controllerClass();
    $router->addRoute($path, $controller, $routeConfig['method']);
}

// Get the matched route
$matchedRoute = $router->route($_SERVER['REQUEST_URI']);

if ($matchedRoute !== null) {
    // No need to call execute, as the execution is handled within the router
} else {
    echo "404 Not Found";
}
