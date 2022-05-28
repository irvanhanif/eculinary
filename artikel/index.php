<?php
if(isset($request)){
    $path = "../";
    $request = explode("artikel/", $request)[1];
    switch (explode("/", $request)[0]) {
        case 'create' :
            // $pathUser = $path . "user/";
            require "./view/artikel/PenambahanArtikel.php";
            break;
        case 'detail' :
            $path = $path . "../";
            $url = "../../user/";
            // $id = 1;
            $id = explode("/", $request)[1];
            // echo $id;
            require_once "artikel/controller.artikel.php";
            $data = (new c_artikel())->showDetailArtikel($id);
            // var_dump($data);
            require "./view/artikel/DetailArtikel.php";
            break;
        default:
            http_response_code(404);
            break;
    }
}else{
    // header("Location: ../");
    if (!isset($_SESSION)) session_start();
    $artikelPath = true;
    $path = "../";
    $url = "../user/";
    require "../view/artikel/daftarArtikel.php";
}