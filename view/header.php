<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .logo {
    /* width: 81px; */
    height: 72px;
    display: flex;
    }
.namaapp{
    margin-left: 42px;
    margin-right: 42px;
    /* padding-top: 24px; */
    padding: 16px 0;
    display: flex;
    justify-content: space-between;
    }
.appname {
    font-family: 'Nunito';
    font-style: normal;
    font-weight: 900;
    font-size: 36px;
    align-items: center;
    color: #7E8661;
    margin-top: 10px;
    /* width: 500px; */
    height: 50px;
    display: flex;
    margin-left : 10px;
    }
header {
    /* width: 101.2%; */
    width: 100%;
    /* height: 110px; */
    background: #FFFFFF;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
    /* margin-top: -23px; */
    /* margin-left: -10px; */
    position: fixed;
    z-index: 99;
}
.search{
    display: flex;
    position: relative;
    padding: 0 15px;
    width: 100%;
    max-width: 350px;
}
#searchbox{
    padding: 10px;
    font-size: 16px;
    border-radius: 25px;
    border: none;
    background-color: #DEDEDE;
    text-indent: 10px;
    margin: auto;
    width: 100%;
}
.search .searchbtn{
    position: absolute;
    height: 35px;
    width: 35px;
    right: 17px;
    color: #DEDEDE;
    /* padding: 10px; */
    border-radius: 50%;
    top: 18.5px;
    font-size: small;
    background-color: #7E8661;
    display: flex;
}
.search .searchbtn i{
    margin: auto;
}
.akun {
    display: flex;
}
.akun *{
    margin: auto;
    margin-right: 5px;
    margin-left: 5px;
    color: black;
    text-decoration: none;
}
    </style>
</head>
<header>
    <div class="namaapp">
        <div class="logo">
        <img
            src="https://anima-uploads.s3.amazonaws.com/projects/6273e7409db3428425c9166e/releases/6273e74a86d103405404dfa2/img/fa6-solid-bowl-food@2x.svg"
        />
        <h1 class="appname">E-<span style="color: #FFAB65">Culinary</span></h1>
        </div>
        <div class="search">
            <input type="text" id="searchbox" placeholder="Cari disini">
            <div class="searchbtn"><i class="fa-solid fa-magnifying-glass"></i></div>
        </div>
        <div class="akun">
            <a href="">Makanan & Minuman</a>
            <a href="">Artikel</a>
            <img src="<?php if(isset($path)) echo $path ?>view/asset/wishlist.png" alt="wishlist">
            <img src="<?php if(isset($path)) echo $path ?>view/asset/account.png" alt="akun">
        </div>
    </div>
</header>