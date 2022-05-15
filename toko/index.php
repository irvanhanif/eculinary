<?php
if(isset($request)){
    $path = "../";
    $request = explode("toko/", $request)[1];
    switch (explode("/", $request)[0]) {
        case 'create' :
            require "./view/toko/pendaftaranpenjual.php";
            break;
        case 'detail' :
            $id = explode("/", $request)[1];
            require "./view/toko/detailToko.php";
            break;
        case 'own' :
            require_once "toko/controller.toko.php";
            $data = (new c_toko())->getMyToko();
            require "./view/toko/detailToko.php";
            break;
        default:
            http_response_code(404);
            break;
    }
}else{
    header("Location: ../");
}