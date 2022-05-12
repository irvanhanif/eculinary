<?php
$request = $_SERVER['REQUEST_URI'];
$request = explode("/eculinary2/user", $request)[1];
switch (explode("/", $request)[0]) {
    case 'register' :
        require "../view/user/register.php";
        break;
    case 'login' :
        require "../view/user/login.php";
        break;
    default:
        http_response_code(404);
        break;
}