<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        h2 {
            margin-left : 48px;
        }
    </style>
</head>
<body>
<div class="filter-wrapper">
            <h2>Urutkan Berdasarkan</h2>
            <form action="">
                <input type="button" name="terbaru" value="Terbaru">
            </form>
        </div>
        <div>
        <?php 
            for ($i = 0; $i <= 10; $i++) {
                require 'toko.php';
            }
        ?>
        </div>
</body>
