<?php
$menuPath = "../../";
require_once "../../menu/controller.menu.php";
$dataKomentar = (new c_menu())->getAllKomentar($_GET["id_menu"]);
$data = array();

for ($i=count($dataKomentar)-1; $i >=0  ; $i--) {
    $data[] = $dataKomentar[$i];
}
for ($i=0; $i < count($data); $i++) {
    echo "{"; 
    foreach($data[$i] as $key=>$value){
        echo $key . "=" .$value ."|";
    }
    echo "},";
}