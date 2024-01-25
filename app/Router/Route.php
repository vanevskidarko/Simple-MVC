<?php
// app/mvc/Route.php

namespace mvc;

class Route
{
    private $path;
    private $controller;
    private $method;
    private $parameters = [];

    public function __construct($path, $controller, $method)
    {
        $this->path = $path;
        $this->controller = $controller;
        $this->method = $method;
    }

    public function matches($requestUri)
    {
        return $this->path === $requestUri;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
}
