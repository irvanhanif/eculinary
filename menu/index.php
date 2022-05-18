<?php
if(isset($request)){
    $path = "../";
    $request = explode("menu/", $request)[1];
    switch (explode("/", $request)[0]) {
        case 'detail' :
            $path = $path . "../";
            $id = explode("/", $request)[1];
            // echo $id;
            require_once "menu/controller.menu.php";
            $data = (new c_menu())->getMenu($id);
            if(!$data) header("Location: ../");
            require "./view/menu/detailmakanan.php";
            break;
        default:
            http_response_code(404);
            break;
    }
}else{
    // header("Location: ../");
    if (!isset($_SESSION)) session_start();
    $path = "../";
    $url = "../user/";
    require "../view/menu/daftarmakananminuman.php";
}