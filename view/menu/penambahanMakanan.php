<html>
    <body>
        <div class="menu-wrapper">
            <div class="tambah-menu">
                <form class="content" action="" method="post" enctype="multipart/form-data">
                    <div class="left-content">
                        <h1>Menu Toko</h1>
                        <div class="form">
                            <p>Nama</p>
                            <input id="nama-makanan" type="text" name="nama-makanan" placeholder="Masukan nama makanan/minuman" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Harga(Rp)</p>
                            <input id="harga" type="text" name="harga" placeholder="Masukan harga makanan/minumam" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Kategori</p>
                            <input id="kategori" type="text" name="kategori" placeholder="Masukan kategori makanan/minuman" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Jenis</p>
                            <input id="makanan" type="radio" name="jenisMakanan" value="makanan">
                            <label for="makanan">Makanan</label>
                            <input id="minuman" type="radio" name="jenisMakanan" value="minuman">
                            <label for="minuman">Minuman</label>
                            <input id="lain" type="radio" name="jenisMakanan" value="lainnya">
                            <label for="lain">Lainnya</label><br>
                        </div>
                        <input class ="submit" type="submit" name="submitMenu" value="Tambahkan">
                    </div>
                    <div class="right-content">
                        <img src="../view/asset/sup.png" alt="gambar" id="img-menu">
                        <label class="pilih-gambar"><input type="file" onchange="readURL(this);" accept=".jpg,.jpeg,.png" name="avatar"/>Pilih Gambar</label>
                    </div>
                </form>
            </div>
            <?php
            require_once "menu/controller.menu.php";
            $daftarMenu = (new c_menu())->getAllMenuToko($data["id_toko"], '', '');
            // var_dump($daftarMenu);
            ?>
            <div class="daftar-makanan">
                <?php 
                    for ($i = 0; $i < count($daftarMenu); $i++) {
                        require 'makanan.php';
                    }
                ?>
            </div>
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            document.getElementById("img-menu").setAttribute('src', e.target.result)
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        </div>
    </body>
</html>