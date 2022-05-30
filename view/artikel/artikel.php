<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php if(isset($path)) echo $path ?>view/css/artikel.css">
    </head>
    <body>
        <div class="artikel-wrapper" >
            <div class="artikel" onclick="location.href='<?php if(isset($path)) echo $path ?>artikel/detail/<?php echo $data[$i]['id_artikel'] ?>'">
                <img class="gambar-artikel" src="<?php if(isset($path)) echo $path ?>view/asset/artikel.png" alt="artikel">
                <h4 class="judul-artikel"><b><?php echo $data[$i]["judul_artikel"] ?></b></h4>
                    <h4 class="author">by <?php echo $data[$i]["nama_penulis"] ?></h4>
            </div>
        </div>
    </body>
</html>