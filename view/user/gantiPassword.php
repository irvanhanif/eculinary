<?php require_once 'header.html'; ?>
<div class="profil">
    <img src="profile.png" alt="Profil">
    <p>Hi, Jong Un!</p>
    <p>Kota Malang</p>

    <div class="profil"><img src="account.png" alt="profil">
    <p>Profil</p></div>

    <div class="password"><img src="lock.png" alt="password">
    <p>Ubah Password</p></div>
    
    <div class="wishlist"><img src="favorite-file.png" alt="wishlist">
    <p>Wishlist</p></div>
    
    <div class="toko"><img src="shop.png" alt="toko">
    <p>Toko</p></div>
    
    <div class="tulisArtikel"><img src="edit-file.png" alt="tulisArtikel">
    <p>Tulis Artikel</p></div>
    
    <div><img src="Logout.png" alt="logout">
    <p>Logout</p></div>
</div>

<form class="ubahpswd" action="" method="post">
    <p>Ubah Password</p>
<div class="passwordnow">
    <p>Password saat ini</p>
    <input type="password" name="passwordnow">
</div>
<div class="passwordlater">
    <p>Password yang baru</p>
    <input type="password" name="passwordlater">
</div>
<p>Lupa Password?</p>
<input type="submit" name="submit">
</form>
<?php require_once 'footer.html'; 
if(isset($_POST["submit"])){
    require "user/controller.user.php";
    $user_1 = new c_user();
    $token = $user_1->updatePassword($_POST["passwordlater"]);
    if($token){
        $user_1->inputToken($token);
    }
  }