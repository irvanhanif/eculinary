<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/akun.css">
</head>
<body>
<?php
if(isset($_SESSION["user-culinary"])){
?>
<?php require_once '../header.php'; ?> 
<div class="password-wrapper">
    <?php require_once 'daftarKonten.php'?>
            <form class="ubahpswd" action="" method="post">
            <h1 class="header1">Ubah Password</h1>
                <div class="passwordnow">
                    <p class="password-now">Password saat ini</p>
                    <input class="kolom" type="password" name="passwordnow">
                </div>
                <div class="passwordlater">
                    <p class="password-later">Password yang baru</p>
                    <input class="kolom" type="password" name="passwordlater">
                </div>
                <a href="">Lupa Password?</a>
                <input class="kirim-password" type="submit" name="submit" value="Simpan">
            </form>
</div>
</body>
<?php require_once '../footer.html'; 
if(isset($_POST["submit"])){
    require "user/controller.user.php";
    $user_1 = new c_user();
    $token = $user_1->updatePassword($_POST["passwordlater"]);
    if($token){
        $user_1->inputToken($token);
    }
}
}else{
    header("Location: ../");
}