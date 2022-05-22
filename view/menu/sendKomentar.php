<?php
$menuPath = "../../";
require_once "../../menu/controller.menu.php";
$komentar = new c_menu();
$komentar->createKomentar($_POST["id_menu"], $_POST["komentar"]);
