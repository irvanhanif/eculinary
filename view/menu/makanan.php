<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="view/css/style.css">
    </head>
    <body>
        <div class="makanan-wrapper">
        <div class="makanan">
            <img src="<?php if(isset($path)) echo $path ?>view/asset/makanan.png" alt="foto-makanan">
            <h4><b>Mie Iblis</b></h4>
            <div class="informasi-makanan">
                <h4>Rp 10.000</h4>
                <div class="komentar">
                    <img src="view/asset/chat.png" alt="chat">
                    <h5>1rb</h5>
                </div>
            </div>
            <div class="informasi-makanan">
                <h4 style="color:#8b8b8b">Malang</h4>
                <div class="rating">
                    <img src="view/asset/bintang.png" alt="star">
                </div>
            </div>
        </div>
        </div>
    </body>
</html>