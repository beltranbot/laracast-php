<?php

$uri = $_SERVER["REQUEST_URI"];

$uri = parse_url($uri)["path"];

$routes = [
    "/" => "controllers/index.php",
    "/note" => "controllers/note.php",
    "/notes" => "controllers/notes.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php",
];

function abort($code = 404): void
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

function routeToController($routes, $uri): void
{
    if (!array_key_exists($uri, $routes)) {
        abort();
    }

    require $routes[$uri];
}

routeToController($routes, $uri);
