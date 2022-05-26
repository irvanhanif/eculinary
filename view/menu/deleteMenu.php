<?php
$menuPath = "../../";
require_once "../../menu/controller.menu.php";
$menu = new c_menu();
$menu->deleteMenu($_POST["id_menu"]);