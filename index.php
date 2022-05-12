<?php
require "user/controller.user.php";
// require "toko/controller.toko.php";
// require "menu/controller.menu.php";
// require "artikel/controller.artikel.php";
// require "./uploadHandler.php";
?>
<!-- <form action="" method="post" enctype="multipart/form-data">
<input type="file" name="uploadedfile" accept="image/*" id="file">
<input type="submit" value="upload" name="upload">
</form> -->
<?php
// if(isset($_POST["upload"])){
//     $pathAvatar = (new uploadHandler($_FILES["uploadedfile"]))->uploadAvatar('menu');
// }
$user_1 = new c_user();
// $user_1->register("randi", "randigmail", "anjay123");
// $user_1->register("randi", "Randi Ahmad Pratama", "randigmail", "02083983893", "jalankenangan", "Laki-Laki", "2002-10-1",  "anjay123");
// var_dump($user_1->login("randigmail", "anjay"));
$data = $user_1->login("randigmail", "hehe222");
// (new c_artikel())->showDetailArtikel(1);
// echo $_SESSION["user-culinary"]["id_user"];
// echo $_SESSION["user-culinary"]["username"];
// $data = $user_1->logout();
// echo $user_1->updatePassword("hehe222");
// echo $user_1->inputToken("8300");
// $toko_1 = new c_toko();
echo $data;

// echo $_SESSION["user-culinary"]["id_user"];
// $success = $toko_1->createToko("toko jaya agung", "jalan kaliurang", "banyuwangi", "tjagmail", "0902900290", "09:00", "19:00");
// echo $success;
// var_dump((new c_toko())->getAllToko());

// $artikel_1 = new c_artikel();
// $artikel_1->postArtikel('huru hara', 'lorem ipsum');
// var_dump($artikel_1->showDetailArtikel(5));

// $menu = new c_menu();
// $menu->deleteMenu(1);