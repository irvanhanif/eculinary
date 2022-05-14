<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/register.css">
</head>
<?php require_once './view/header.html'; ?>
<body>
  <form method="post" action="" method="post">
    <p class="daftar"><b>Daftar</b></p>
    <p>Username</p>
    <input class="kolom" type="text" name="username" placeholder="Masukan Username"required="required"><br>
    <p>Email</p>
    <input class="kolom" type="text" name="email" placeholder="Masukan Email" required="required"><br>
    <p>Kata Sandi</p>
    <input class="kolom" type="password" name="password" placeholder="Masukan Kata Sandi" required="required"><br>
    <div class="kebijakan-box">
      <input type="checkbox" class="checkbox" required>
      <p class="kebijakan">Saya menerima syarat dan ketentuan yang berlaku</p>
    </div>
    <input class="submit" type="submit" value="Daftar" name="daftar">
    <div class="kembali">
      <p class="back">Kembali</p>
    </div>
    <p class="punya">Sudah mempunyai akun? <span style="color : #FFAB65" > Masuk</span></p>
  </form>
  <footer>
  <p class="footer">© E-Culinary 2022. Hak Cipta Dilindungi</p>
  </footer>  
</body>
</html>
<?php
if(isset($_POST["daftar"])){
  require "user/controller.user.php";
  $user = new c_user();
  if($user->register($_POST["username"], $_POST["email"], $_POST["password"])){
    header("Location: ../");
  }
}