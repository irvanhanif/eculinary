<?php
if(isset($request)){
    $path = "../";
    $request = explode("user/", $request)[1];
    switch (explode("/", $request)[0]) {
        case 'register' :
            require "./view/user/register.php";
            break;
        case 'login' :
            require "./view/user/login.php";
            break;
        case 'setting' :
            // $path = "";
            require "./view/user/akun.php";
            break;
        case 'setpw' :
            // $path = "";
            require "./view/user/gantiPassword.php";
            break;
        case 'wishlist' :
            require "./view/user/wishlist.php";
            break;
        default:
            http_response_code(404);
            break;
    }
}else{
    header("Location: ../");
}