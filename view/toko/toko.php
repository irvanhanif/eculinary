<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    * {
    box-sizing: border-box;
}
body {
    font-family: "roboto";
    background-color: #f5f5f5;
    margin: 0;
}
        h4 {
    margin: 0px;
}
h5 {
    margin: 0px;
    font-weight: normal;
    color: #8b8b8b;
}
.komentar img{
    float: right;
}
.komentar h5 {
    float: right;
    margin: auto;
}
.toko-wrapper {
    float: left;
    width: 25%;
    margin-bottom: 48px;
}
.toko {
    margin: auto;
    height: 280px;
    width: 240px;
    border-radius: 24px;
    background-color: #ffffff;
    box-shadow: 2px 2px 20px 0px #00000040;
    padding: 24px;
}
.informasi-toko {
    display: flex;
}
.informasi-toko h4, .komentar, .rating {
    font-weight: normal;
    width: 50%;
    margin-top: 6px;
}
.toko img {
    margin-bottom: 24px;
}
.komentar h5, .komentar img {
    float: right;
    margin: auto;
}
.rating img{
    float: right;
    width: 80px;
}
    </style>
    </head>
    <body>
        <div class="toko-wrapper">
        <div class="toko">
            <img src="gacoan.png" alt="foto-toko">
            <h4><b>Mie Gacoan</b></h4>
            <div class="informasi-toko">
                <div class="komentar">
                    <img src="chat.png" alt="chat">
                    <h5>1rb</h5>
                </div>
            </div>
            <div class="informasi-toko">
                <h4 style="color:#8b8b8b">Malang</h4>
                <div class="rating">
                    <img src="bintang.png" alt="bintang">
                </div>
            </div>
        </div>
        </div>
    </body>
</html>