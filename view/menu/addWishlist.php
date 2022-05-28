<?php
if(isset($_SESSION["user-culinary"])){
    $menuPath = "../../";
    require_once "../../menu/controller.menu.php";
    $wishlist = new c_menu();
    $wishlist->createWishlist($_POST["id_menu"]);
}else{
    ?>
        <script>
            function mustIn(){
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
    <?php
}