<?php

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$routes = [
    "/" => "../Controllers/View/Home.Controller.php",
    "/home" => "../Controllers/View/Home.Controller.php",
    "/login" => "../Controllers/Auth/Login.Controller.php",
    "/register" => "../Controllers/Auth/Register.Controller.php",
    "/logout" => "../Controllers/Auth/Logout.Controller.php",
    "/chat" => "../Controllers/View/Chat.Controller.php",
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

routeToController($uri, $routes);
