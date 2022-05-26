<?php $id_toko = (new c_toko())->getIdToko(); ?>
<html>
    <body>
        <div class="menu-wrapper">
            <div class="tambah-menu">
                <form class="content" action="" method="post" enctype="multipart/form-data">
                    <div class="left-content">
                        <h1>Menu Toko</h1>
                        <div class="form">
                            <p>Nama</p>
                            <input id="nama-makanan" type="text" name="nama-makanan" placeholder="Masukan nama makanan/minuman" value='<?php if(isset($dataMakanan)) echo $dataMakanan["nama_menu"] ?>' required="required"><br>
                        </div>
                        <div class="form">
                            <p>Harga(Rp)</p>
                            <input id="harga" type="text" name="harga" placeholder="Masukan harga makanan/minumam" value='<?php if(isset($dataMakanan)) echo $dataMakanan["harga"] ?>' required="required"><br>
                        </div>
                        <div class="form">
                            <p>Kategori</p>
                            <select name="kategori" id="kategori" onChange="inputKategori()" required>
                                <?php $value = array("Ayam", "Nasi Goreng", "Sup", "Mie", "Bakso", "Pizza", "Burger", "Kopi", "Jus", "Es Krim") ?>
                                <option value="Ayam" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Ayam") echo "selected" ?>>Ayam</option>
                                <option value="Nasi Goreng" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Nasi Goreng") echo "selected" ?>>Nasi Goreng</option>
                                <option value="Sup" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Sup") echo "selected" ?>>Sup</option>
                                <option value="Mie" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Mie") echo "selected" ?>>Mie</option>
                                <option value="Bakso" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Bakso") echo "selected" ?>>Bakso</option>
                                <option value="Pizza" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Pizza") echo "selected" ?>>Pizza</option>
                                <option value="Burger" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Burger") echo "selected" ?>>Burger</option>
                                <option value="Kopi" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Kopi") echo "selected" ?>>Kopi</option>
                                <option value="Jus" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Jus") echo "selected" ?>>Jus</option>
                                <option value="Es Krim" <?php if(isset($dataMakanan) && $dataMakanan["kategori"] == "Es Krim") echo "selected" ?>>Es Krim</option>
                                <option value="lainnya" <?php if(isset($dataMakanan) && (!array_search($dataMakanan["kategori"], $value))) echo "selected" ?>>lainnya</option>
                            </select>
                        </div>
                        <div class="kategoriInput"></div>
                            <script>
                                inputKategori()
                                function inputKategori(){
                                    if(document.getElementById("kategori").getElementsByTagName("option")[10].selected){
                                        document.querySelector(".kategoriInput").innerHTML = "<input type='text' name='kategori' value='<?php if(isset($dataMakanan)) echo $dataMakanan["kategori"] ?>' placeholder='Masukan kategori makanan/minuman'>"
                                    }else{
                                        document.querySelector(".kategoriInput").innerHTML = ""
                                    }
                                }
                            </script>
                        <div class="form">
                            <p>Jenis</p>
                            <input id="makanan" type="radio" name="jenisMakanan" value="Makanan" <?php if(isset($dataMakanan) && $dataMakanan["jenis"] === "Makanan") echo "checked" ?>>
                            <label for="makanan">Makanan</label>
                            <input id="minuman" type="radio" name="jenisMakanan" value="Minuman" <?php if(isset($dataMakanan) && $dataMakanan["jenis"] === "Minuman") echo "checked" ?>>
                            <label for="minuman">Minuman</label>
                            <input id="lain" type="radio" name="jenisMakanan" value="Lainnya" <?php if(isset($dataMakanan) && $dataMakanan["jenis"] === "Lainnya") echo "checked" ?>>
                            <label for="lain">Lainnya</label><br>
                        </div>
                        <?php if(isset($dataMakanan) && $dataMakanan["id_menu"]){?>
                            <input class ="submit-btn" type="submit" name="simpanMenu" value="Simpan">
                            <p id="deleteAkun" onclick="deleteMenu()">Hapus Menu</p>
                            <p class="submit-btn" onclick="location.href='own'">Tambah Menu</p>
                        <?php } else { ?>    
                            <input class ="submit-btn" type="submit" name="submitMenu" value="Tambahkan">
                        <?php } ?>
                    </div>
                        <script>
                            function deleteMenu(){
                                Swal.fire({
                                title: 'Apakah kamu yakin?',
                                text: "Kamu tidak dapat mengembalikannya ke semula!",
                                icon: 'Peringatan',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, hapus menu ini!'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    fetch("http://localhost:8080/eculinary2/view/menu/deleteMenu.php",{
                                        method: "POST",
                                        headers: {
                                            'Content-Type': 'application/x-www-form-urlencoded',
                                        },
                                        body: "id_menu=<?php if(isset($dataMakanan["id_menu"])) echo $dataMakanan["id_menu"]; else echo 0 ?>"
                                    })
                                    .then(res => res.text())
                                    .then(data => console.log(data))
                                    Swal.fire(
                                    'Berhasil dihapus!',
                                    'menu <?php if(isset($dataMakanan["nama_menu"])) echo $dataMakanan["nama_menu"]; else echo '' ?> telah dihapus.',
                                    'sukses'
                                    ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href="own";
                                    }});
                                }
                                })
                            }
                        </script>
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