<?php

$request = $_SERVER['REQUEST_URI'];

$request = explode("/eculinary2/", $request)[1];
switch (explode("/", $request)[0]) {
    case '' :
        header("Location: home");
        break;
    case 'home' :
        require "view/homepage.php";
        break;
    case 'user' :
        require "view/homepage.php";
        break;
    default:
        // http_response_code(404);
        break;
}