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
            $menu = $data[1];
            $data = $data[0];
            // var_dump($data);
            $path = $path . "../";
            require "./view/toko/detailToko.php";
            break;
        case 'own' :
            $data = (new c_toko())->getMyToko();
            if($data) $data = $data[0];
            // var_dump($data);
            // $own = true;
            // $pathUser = $path . "user/";
            require_once "./view/toko/pendaftaranpenjual.php";
            // if($data) require "./view/menu/penambahanMakanan.php";
            break;
        default:
            if(substr($request, 0, 3) === "own" && substr($request, 3, 4) === "?id="){
                $data = (new c_toko())->getMyToko();
                if($data) $data = $data[0];
                require_once "menu/controller.menu.php";
                // substr($request, 7, strlen($request)-4)
                $dataMakanan = (new c_menu())->getMenu($_GET["id"]);
                if(count($dataMakanan) == 1) $dataMakanan = $dataMakanan[0];
                require_once "./view/toko/pendaftaranpenjual.php";
                // var_dump($dataMakanan);
            }else{
                http_response_code(404);
            }
            break;
    }
}else{
    header("Location: ../");
}