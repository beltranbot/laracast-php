<?php

$routes = require base_path("routes.php");

function abort($code = 404): void
{
    http_response_code($code);

    view("views/{$code}.php");

    die();
}

function routeToController($routes, $uri): void
{
    if (!array_key_exists($uri, $routes)) {
        abort();
    }

    require base_path($routes[$uri]);
}

$uri = $_SERVER["REQUEST_URI"];

$uri = parse_url($uri)["path"];

routeToController($routes, $uri);
