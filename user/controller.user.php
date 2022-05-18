<?php
require_once "./config.php";
require "model.user.php";
require_once "./uploadHandler.php";
class c_user{
    private $model;
    private $conn;

    public function __construct(){
        if (!isset($_SESSION)) session_start();
        $this->model = new m_user();
        $this->conn = new database();
    }
    public function register($username, $email, $password){
        $this->model->dataLogin($email, $password);
        $result = $this->model->selectUserWithEmail($this->conn);
        if(count($result) >= 1) $result = $result[0];
        if(isset($result["id_user"])) return array(false, 1);
        $this->model->postUser($username, $email, $password);
        $result = $this->model->insertUser($this->conn);
        if(!$result) return array(false, 0);
        $result = $this->model->selectUserWithEmail($this->conn);
        if(count($result) >= 1) $result = $result[0];
        unset($result["password"]);
        $_SESSION["user-culinary"] = $result;
        return array(true);
    }

    public function login($email, $password){
        $this->model->dataLogin($email, $password);
        $result = $this->model->selectUserWithEmail($this->conn);
        if(count($result) >= 1) $result = $result[0];
        if(!isset($result["id_user"])) {
            echo "incorrect email";
            return false;
        }
        else if($result["password"] !== md5($password)) {
            echo "incorrect password";
            return false;
        }
        unset($result["password"]);
        $_SESSION["user-culinary"] = $result;
        return true;
    }

    // public function logout(){
    //     unset($_SESSION["user-culinary"]);
    //     session_destroy();
    // }

    public function getDetailAkun(){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->model->getInfoAkun($this->conn, $id_user);
            if(count($result) >= 1) $result = $result[0];
            unset($result["password"]);
            return $result;
        }return false;
    }

    public function updateAkun($username, $nama, $email, $nomorTelepon, $alamat, $jenisKelamin, $tanggalLahir, $avatar){
        if(isset($this->model)){
            $pathAvatar = (new uploadHandler($avatar))->uploadAvatar('user');
            // var_dump($pathAvatar);
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->model->dataEdit($username, $nama, $email, $nomorTelepon, $alamat, $jenisKelamin, $tanggalLahir, $pathAvatar, $id_user);
            $result = $this->model->editUser($this->conn);
            return $result;
        }return false;
    }

    public function updatePassword($newPassword){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->model->dataEditPassword($newPassword, $id_user, $this->conn);
            return $result;
        }return false;
    }
    
    public function inputToken($token){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->model->inputTokenPassword($token, $id_user, $this->conn);
            return $result;
        }return false;
    }

    public function deleteUser(){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->model->deleteUser($this->conn, $id_user);
            return $result;
        }return false;
    }
}