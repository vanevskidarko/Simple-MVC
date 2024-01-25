<?php
// app/mvc/Router.php
namespace mvc;

class Router
{
    private $routes = [];

    public function addRoute($path, $controller, $method)
    {
        $this->routes[] = new Route($path, $controller, $method);
    }

    public function route($requestUri)
    {
        foreach ($this->routes as $route) {
            // Check if the request URI matches the route path
            if (preg_match($this->getRouteRegex($route->getPath()), $requestUri, $matches)) {
                // Set parameters based on the regex matches
                $route->setParameters(array_slice($matches, 1));

                // Execute the controller method
                $controller = $route->getController();
                $method = $route->getMethod();
                $parameters = $route->getParameters();
                call_user_func_array([$controller, $method], $parameters);

                return $route;
            }
        }

        return null;
    }


    // Helper method to convert route path to regex
    private function getRouteRegex($path)
    {
        return "#^" . preg_replace('#:([\w]+)#', '([\w-]+)', $path) . "$#";
    }
}
