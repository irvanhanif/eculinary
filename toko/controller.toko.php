<?php
require_once "./config.php";
require "model.toko.php";

class c_toko{
    private $model;
    private $conn;

    public function __construct(){
        if (!isset($_SESSION)) session_start();
        $this->model = new m_toko();
        $this->conn = new database();
    }

    public function createToko($namaToko, $alamat, $kota, $email, $nomorTelepon, $jamAwal, $jamAkhir){
        if(isset($_SESSION["user-culinary"])){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->model->postToko($namaToko, $alamat, $kota, $email, $nomorTelepon, $id_user, $jamAwal, $jamAkhir);
            $result = $this->model->createToko($this->conn);
            return $result;
        }else return false;
    }

    public function getAllToko(){
        $allToko = $this->model->getAllToko($this->conn);
        return $allToko;
    }

    public function getToko($id_toko){
        $detailToko = $this->model->getDetailToko($this->conn, $id_toko);
        return $detailToko;
    }

    public function updateToko($namaToko, $alamat, $kota, $email, $nomorTelepon, $jamAwal, $jamAkhir, $id_toko){
        if(isset($_SESSION["user-culinary"])){
            if($this->model->getIdToko($this->conn, $_SESSION["user-culinary"]["id_user"]) === $id_toko){
                $this->model->dataUpdate($namaToko, $alamat, $kota, $email, $nomorTelepon, $jamAwal, $jamAkhir, $id_toko);
                $result = $this->model->createToko($this->conn);
                return $result;
            } else return false;
        }else return false;
    }

    public function deleteToko($id_toko){
        if(isset($_SESSION["user-culinary"])){
            if($this->model->getIdToko($this->conn, $_SESSION["user-culinary"]["id_user"]) === $id_toko){
                $result = $this->model->deleteToko($this->conn, $id_toko);
                return $result;
            } else return false;
        }else return false;
    }

    public function getAllTokoinCity($kota){
        $allToko = $this->model->filterLokasiToko($this->conn, $kota);
        return $allToko;
    }   
}