<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
</head>
<?php require_once 'header.html'; ?>
    <form method="post" action="" method="post">
<p class="daftar"><b>Daftar</b></p>
<p>Username</p>
<input class="kolom" type="text" name="username" placeholder="Masukan Username"
required="required"><br>
<p>Email</p>
<input class="kolom" type="text" name="email" placeholder="Masukan Email"
required="required"><br>
<p>Kata Sandi</p>
<input class="kolom" type="password" name="password" placeholder="Masukan Kata Sandi"
required="required"><br>
          <input type="checkbox" class="checkbox">
            <p class="kebijakan">Saya menerima syarat dan ketentuan yang berlaku
          </p>
        <input class="submit" type="submit" value="Daftar" name="daftar">
        </input>
        <div class="kembali">
            <p class="back">Kembali</p>
        </div>
          <p class="punya">Sudah mempunyai akun? <span style="color : #FFAB65" > Masuk</span></p>
        </div>
      </form>
    <footer>
        <p class="footer">© E-Culinary 2022. Hak Cipta Dilindungi</p>
    </footer>
</html>
<?php
if(isset($_POST["daftar"])){
  require "user/controller.user.php";
  $user_1 = new c_user();
  if($user_1->register($_POST["username"], $_POST["email"], $_POST["password"])){
    header("Location: homepage.php");
  }
}