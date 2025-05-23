<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        $this->addRoute($uri, $controller, Method::GET);
    }

    public function post($uri, $controller)
    {
        $this->addRoute($uri, $controller, Method::POST);
    }

    public function delete($uri, $controller)
    {
        $this->addRoute($uri, $controller, Method::DELETE);
    }

    public function put($uri, $controller)
    {
        $this->addRoute($uri, $controller, Method::PUT);
    }

    public function patch($uri, $controller)
    {
        $this->addRoute($uri, $controller, Method::PATCH);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
                return require base_path($route["controller"]);
            }
        }

        $this->abort();
    }

    public function abort($code = 404): void
    {
        http_response_code($code);

        view("{$code}.php");

        die();
    }

    //// private ////

    private function addRoute($uri, $controller, $method)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
        ];
    }
}
