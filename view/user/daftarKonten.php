<html>
    <head>
        <link rel="stylesheet" href="../view/css/style.css">
    </head>
    <body>
        <div class="list-content">
            <div class="profil">
                <img src="../view/asset/profile.png" alt="Profil">
                <div class="hi">
                    <p><b>Hi, <?php if(isset($data["username"])) echo $data["username"]; else echo 'user' ?>!</b></p>
                    <p>Kota Malang</p>
                </div>
            </div>
            <div class="content-option" onclick = "location.href='<?php if(isset($pathUser)) echo $pathUser ?>setting'">
                <img src="../view/asset/account.png" alt="akun">
                <a>Profil</a>
            </div>
            <div class="content-option" onclick = "location.href='<?php if(isset($pathUser)) echo $pathUser ?>setpw'">
                <img src="../view/asset/lock.png" alt="password">
                <a>Ubah Password</a>
            </div>
            <div class="content-option" onclick = "location.href='wishlist'">
                <img src="../view/asset/favorite-file.png" alt="wishlist">
                <a>Wishlist</a>
            </div>
            <div class="content-option" onclick = "location.href='../toko/own'">
                <img src="../view/asset/shop.png" alt="toko">
                <a>Toko</a>
            </div>
            <div class="content-option">
                <img src="../view/asset/edit-file.png" alt="tulisArtikel">
                <a>Tulis Artikel</a>
            </div>
            <div class="content-option" onclick = "location.href='../view/user/logout.php'">
                <img src="../view/asset/Logout.png" alt="logout">
                <a>Logout</a>
            </div>
        </div>
    </body>
</html>