<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($uri_parse)
{
    case '/home':
        include 'home.php';
    break;

    default:
        header("Location: /home");
    break;
}