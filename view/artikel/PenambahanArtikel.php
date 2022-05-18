<html>
    <head>
        <link rel="stylesheet" href="../view/css/style.css">
    </head>
    <body>
<?php
if(isset($_POST["submit"])){
    require "artikel/controller.artikel.php";
    $artikel_1 = new c_artikel();
    if($artikel_1->postArtikel($_POST["namapenulis"], $_POST["judul"], $_POST["isi"], $_FILES["image"])){
      header("Location: ../");
    }
  }
?>
        <?php require_once 'view/header.php'; ?>
        <div class="wrapper">
            <?php include 'view/user/daftarKonten.php'; ?>
                <form class="content" action="" method="post" enctype="multipart/form-data">
                    <div class="left-content">
                        <h1>Tulis Artikel</h1>
                        <div class="form">
                            <p>Nama Penulis</p>
                            <input id="nama-penulis" type="text" name="namapenulis" placeholder="Masukan nama Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Judul</p>
                            <input id="judul-artikel" type="text" name="judul" placeholder="Masukan judul artikel" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Isi</p>
                            <textarea name="isi" id="isi-artikel" cols="30" rows="10" placeholder="Tuliskan isi artikel disini"></textarea>
                        </div>
                        <input type="submit" name="submit" value="Unggah"> 
                    </div>
                    <div class="right-content">
                        <img src="../view/asset/edit-file.png" id="img-artikel" alt="gambar">
                        <label class="pilih-gambar"><input type="file" onchange="readURLArtikel(this);" name="image" accept=".jpg,.jpeg,.png"/>Pilih Gambar</label>
                    </div>     
                </form>          
        </div>      
        <?php require_once 'view/footer.html'; ?>
        
        <script>
            function readURLArtikel(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        document.getElementById("img-artikel").setAttribute('src', e.target.result)
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
</html>

