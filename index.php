<?php

$request = $_SERVER['REQUEST_URI'];

$request = explode("/eculinary2/", $request)[1];

if (!isset($_SESSION)) session_start();
switch (explode("/", $request)[0]) {
    case '' :
        header("Location: home");
        break;
    case 'home' :
        require "view/homepage.php";
        break;
    case 'user' :
        require "user/index.php";
        break;
    case 'toko' :
        require "toko/index.php";
        break;
    case 'menu' :
        require "menu/index.php";
        break;
    default:
        http_response_code(404);
        break;
}