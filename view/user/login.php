<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/login.css">
</head>
<body>
<?php require_once './view/header.php'; ?>
    <form method="post" action="" method="post">
<p class="masuk"><b>Masuk</b></p>
<p>Email</p>
<input class="kolom" type="text" name="email" placeholder="Masukan Email"
required="required"><br>
<p>Kata Sandi</p>
<input class="kolom" type="password" name="password" placeholder="Masukan Kata Sandi"
required="required"><br>
<input class="submit" type="submit" value="Masuk" name="masuk">
        </input>
  <div class="kembali" onclick="location.href='../'">
      <p class="back">Kembali</p>
  </div>
  <p class="forget">Lupa kata sandi?</p>
    <p class="tidakpunya">Tidak mempunyai akun? <span style="color : #FFAB65" onclick="location.href='register'" > Daftar</span></p>
</form>
<?php 
if(isset($_POST["masuk"])){
  require "user/controller.user.php";
  $user_1 = new c_user();
  if($user_1->login($_POST["email"], $_POST["password"])){
    header("Location: ../");
  }
}
require_once './view/footer.html'; 
?>
</body>
</html>