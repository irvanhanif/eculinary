<?php
$menuPath = "../../";
require_once "../../menu/controller.menu.php";
$komentar = new c_menu();
$komentar->createRating($_POST["id_menu"], $_POST["bintang"]);