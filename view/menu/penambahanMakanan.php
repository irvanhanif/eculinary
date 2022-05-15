<html>
    <body>
        <div class="menu-wrapper">
            <div class="tambah-menu">
                <form class="content" action="" method="post">
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
                            <input id="makanan" type="radio" name="jenisMakanan">
                            <label for="makanan">Makanan</label>
                            <input id="minuman" type="radio" name="jenisMakanan">
                            <label for="minuman">Minuman</label>
                            <input id="lain" type="radio" name="jenisMakanan">
                            <label for="lain">Lainnya</label><br>
                        </div>
                        <input class ="submit" type="submit" name="submit" value="Tambahkan">
                    </div>
                    <div class="right-content">
                        <img src="assets/imgs/gambar-makanan.png" alt="gambar">
                        <label class="pilih-gambar"><input type="file" accept=".jpg,.jpeg,.png"/>Pilih Gambar</label>
                    </div>
                </form>
            </div>
            <div class="daftar-makanan">
                <?php 
                    for ($i = 0; $i <= 10; $i++) {
                        require 'makanan.php';
                    }
                ?>
            </div>
        </div>
    </body>
</html>