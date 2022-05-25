<?php
if(isset($artikelPath) && $artikelPath){
    require_once "../config.php";
    require_once "../uploadHandler.php";
}else{
    require_once "./config.php";
    require_once "./uploadHandler.php";
}
require "model.artikel.php";

class c_artikel{
    private $model;
    private $conn;

    public function __construct(){
        if (!isset($_SESSION)) session_start();
        if(isset($_SESSION["user-culinary"])){
            $this->model = new m_artikel();
            $this->conn = new database();
        }
    }

    public function postArtikel($namaPenulis, $judulArtikel, $isiArtikel, $image){
        if(isset($this->model)){
            $pathArtikel = (new uploadHandler($image))->uploadAvatar('artikel');
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->model->postArtikel($namaPenulis, $judulArtikel, $_SESSION["user-culinary"]["id_user"], $isiArtikel, $pathArtikel);
            $result = $this->model->insertArtikel($this->conn);
            return $result;
        }else return false;
    }

    public function updateArtikel($namaPenulis, $judulArtikel, $isiArtikel, $id_artikel){
        if(isset($this->model)){
            if($this->model->getIdUser($this->conn, $id_artikel) === $_SESSION["user-culinary"]["id_user"]){
                $id_user = $_SESSION["user-culinary"]["id_user"];
                $this->model->updateData($namaPenulis, $judulArtikel, $isiArtikel, $id_artikel);
                $result = $this->model->updateArtikel($this->conn);
                return $result;
            }else return false;
        }else return false;
    }

    public function deleteArtikel($id_artikel){
        if(isset($this->model)){
            if($this->model->getIdUser($this->conn, $id_artikel) === $_SESSION["user-culinary"]["id_user"]){
                $id_user = $_SESSION["user-culinary"]["id_user"];
                $result = $this->model->deleteArtikel($this->conn, $id_artikel);
                return $result;
            }else return false;
        }else return false;
    }

    public function showArtikel(){
        $result = (new m_artikel())->getAllArtikel((new database()),'','');
        return $result;
    }

    public function showDetailArtikel($id_artikel){
        $result = (new m_artikel())->getAllArtikel((new database()), 1, $id_artikel);
        if(count($result) == 1) $result = $result[0];
        return $result;
    }

    public function searchArtikel($keyword, $order, $flow){
        $result = $this->model->searchEngine($this->conn, $keyword, $order, $flow);
        return $result;
    }

    public function getMyArtikel(){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->model->getAllArtikel($this->conn, 2, $id_user);
            return $result;
        }else return false;
    }
}