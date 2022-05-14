<?php
if(isset($request)){
    $path = "../";
    $request = explode("toko/", $request)[1];
    switch (explode("/", $request)[0]) {
        case 'create' :
            require "./view/toko/pendaftaranpenjual.php";
            break;
        case 'detail' :
            require "./view/toko/detailToko.php";
            break;
        default:
            http_response_code(404);
            break;
    }
}else{
    header("Location: ../");
}