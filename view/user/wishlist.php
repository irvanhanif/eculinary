<?php
if (!isset($_SESSION)) session_start();
if(isset($_SESSION["user-culinary"])){
    require "menu/controller.menu.php";
    $daftarMenu = (new c_menu())->myWishlist();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/wishlist.css">
</head>
<body>
    <?php require_once 'view/header.php'; ?>
    <div class="wishlist-content">
        <?php require_once 'daftarKonten.php'?>
        <div class="wishlist-wrapper">
            <div class="wishlist">
                <h2>Wishlist</h2>
                <div class="daftarMakanan">
                    <?php 
                    // var_dump($daftarMenu);
                    for($i = 0; $i<count($daftarMenu); $i++){
                        require 'view/menu/makanan.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
        <?php require_once 'view/footer.html'; ?>
</body>

<?php
}