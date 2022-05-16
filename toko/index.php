<?php
if(isset($request)){
    require_once "toko/controller.toko.php";
    $path = "../";
    $request = explode("toko/", $request)[1];
    switch (explode("/", $request)[0]) {
        case 'create' :
            require "./view/toko/pendaftaranpenjual.php";
            break;
        case 'detail' :
            $id = explode("/", $request)[1];
            $data = (new c_toko())->getToko($id);
            // var_dump($data);
            $path = $path . "../";
            require "./view/toko/detailToko.php";
            break;
        case 'own' :
            $data = (new c_toko())->getMyToko();
            // var_dump($data);
            $own = true;
            $pathUser = $path . "user/";
            require_once "./view/toko/pendaftaranpenjual.php";
            // if($data) require "./view/menu/penambahanMakanan.php";
            break;
        default:
            http_response_code(404);
            break;
    }
}else{
    header("Location: ../");
}