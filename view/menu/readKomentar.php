<?php
$menuPath = "../../";
require_once "../../menu/controller.menu.php";
$dataKomentar = (new c_menu())->getAllKomentar($_GET["id_menu"]);
$data = array();

for ($i=count($dataKomentar)-1; $i >=0  ; $i--) {
    $data[] = $dataKomentar[$i];
}
// var_dump($data);
for ($i=0; $i < count($data); $i++) {
    ?>
    <div class="comment"><img class="account"src="../../<?php if($data[$i]["avatar"]) echo $data[$i]["avatar"]; else echo "view/asset/profil1.png" ?>" alt="profil">
    <p class="komentar1"><?php echo $data[$i]["isi_komentar"] ?></p></div>
    <?php
}