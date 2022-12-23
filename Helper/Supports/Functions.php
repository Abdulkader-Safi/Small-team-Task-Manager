<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function abort($code = 404)
{
    http_response_code($code);

    require __DIR__ . "/../../Views/{$code}.php";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if (!function_exists('base_path')) {
    function base_path()
    {
        return dirname(__DIR__) . "/..";
    }
}

if (!function_exists('img_path')) {
    function img_path($img)
    {
        return base_path() . "/../../Views/Img" . $img;
    }
}
