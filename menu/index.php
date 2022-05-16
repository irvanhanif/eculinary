<?php
if(isset($request)){
    $path = "../";
    $request = explode("menu/", $request)[1];
    switch (explode("/", $request)[0]) {
        case 'detail' :
            $path = $path . "../";
            $id = explode("/", $request)[1];
            // echo $id;
            require "./view/menu/detailmakanan.php";
            break;
        default:
            http_response_code(404);
            break;
    }
}else{
    header("Location: ../");
}