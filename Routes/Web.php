<?php

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$routes = [
    "/" => "../Controllers/View/Home.Controller.php",
    "/home" => "../Controllers/View/Home.Controller.php",
    "/login" => "../Controllers/Auth/Login.Controller.php",
    "/register" => "../Controllers/Auth/Register.Controller.php",
    "/logout" => "../Controllers/Auth/Logout.Controller.php",
    "/chat" => "../Controllers/View/Chat.Controller.php",
    "/task" => "../Controllers/View/Task.Controller.php",
    "/users" => "../Controllers/Auth/Users.Controller.php",
    "/delete" => "../Controllers/Auth/User/DeleteUser.Controller.php",
    "/edit" => "../Controllers/Auth/User/EditUser.Controller.php",
    "/new_task" => "../Controllers/View/Tasks/NewTask.Controller.php",
    "/update_task" => "../Controllers/View/Tasks/UpdateTask.Controller.php",



    "/favicon" => "../Views/Layouts/CSS/favicon.png"
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
